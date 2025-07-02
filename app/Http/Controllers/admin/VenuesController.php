<?php

namespace App\Http\Controllers\admin;

use App\Models\Area;
use App\Models\Turf;
use App\Models\User;
use App\Models\Images;
use App\Models\Venues;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Encryption\DecryptException;

class VenuesController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();
        $query = Venues::leftJoin('city', 'venues.city_id', '=', 'city.id')
            ->leftJoin('area_code', 'venues.area_id', '=', 'area_code.id')
            ->select('venues.*', 'city.city_name as city_name', 'city.id as city_id', 'area_code.area as area_name', 'area_code.id as area_id');

        if ($user->role_id == 1) $query->where('venues.status', 2);
        elseif ($user->role_id == 2)
            $query->whereIn('venues.created_by', DB::table('users')->where('role_id', 3)->where('created_by', $user->id)->pluck('id'));
        elseif ($user->role_id == 3)
            $query->where('venues.created_by', $user->id);

        if ($request->search) {
            $s = $request->search;
            $query->where(fn($query) => $query->where('city.city_name', 'like', "%$s%")
                ->orWhere('area_code.area', 'like', "%$s%")
                ->orWhere('owner_phone', 'like', "%$s%"));
        }

        $venues = $query->paginate(10);

        $imageIds = $venues->flatMap(function ($v) {
            $turf = is_array($v->turf_image) ? $v->turf_image : explode(',', $v->turf_image ?? '');
            return array_filter([$v->vendor_image, $v->pancard, $v->Aadhaar_card, ...$turf]);
        })->map('intval')->unique()->toArray();

        $images = DB::table('images')->whereIn('id', $imageIds)->get()->keyBy('id');

        $venues->transform(function ($v) use ($images) {
            $v->vendor_image_data  = $images[$v->vendor_image]  ?? null;
            $v->pancard_image_data = $images[$v->pancard]       ?? null;
            $v->aadhaar_image_data = $images[$v->Aadhaar_card]  ?? null;
            $turf = is_array($v->turf_image) ? $v->turf_image : explode(',', $v->turf_image ?? '');
            $v->turf_images = collect($turf)->map(fn($id) => $images[(int)$id] ?? null)->filter();
            return $v;
        });

        $city = DB::table('city')->get();
        $area = $request->city ? Area::where('city_id', $request->city)->get() : Area::all();

        return view('admin.venues.venues', compact('venues', 'city', 'area'));
    }


    public function store(Request $request)
    {
        try {
            $request->validate([
                'city'           => 'required',
                'area'           => 'required',
                'location_text'  => 'required|string',
                'location_link'  => 'required|url',
                'turf_images.*'  => 'image|mimes:jpeg,png,jpg,webp,svg|max:2048',
                'name'           => 'required|string|max:255',
                'email'          => 'required|email',
                'mobileno'       => 'required|digits:10',
                'profile_image'  => 'image|mimes:jpeg,png,jpg,webp,svg|max:2048',
                'pancard_image'  => 'image|mimes:jpeg,png,jpg,webp,svg|max:2048',
                'aadhaar_image'  => 'image|mimes:jpeg,png,jpg,webp,svg|max:2048',
            ]);

            $duplicateVenue = Venues::where('area_id', $request->area)
                            ->where('owner_name', $request->name)
                            ->when($request->id, fn($q) => $q->where('id', '!=', $request->id))
                            ->first();

            if ($duplicateVenue) {
                return response()->json([
                    'error' => 'Venue with the same name already exists in this area.',
                ], 422);
            }

            $venues = $request->id ? Venues::find($request->id) : new Venues();
            $venues->owner_phone = $request->mobileno;
            $venues->password = Hash::make($request['mobileno']);
            $venues->owner_email = $request->email;
            $venues->owner_name = $request->name;
            $venues->vendor_ID = $request->vendor_id;
            $venues->city_id = $request->city;
            $venues->area_id = $request->area;
            $venues->status = $request->status == 'on' ? 1 : 0;
            $venues->location_link = $request->location_link;
            $venues->location_text = $request->location_text;

            $venues->save();

            if ($request->id == null) {
                $i1 = $this->saveImage($request->file('profile_image'));
                $i2 = $this->saveImage($request->file('pancard_image'));
                $i3 = $this->saveImage($request->file('aadhaar_image'));

                $venues->vendor_image = $i1->id;
                $venues->pancard = $i2->id;
                $venues->Aadhaar_card = $i3->id;

                $venues->created_by = Auth::id();
                $venues->save();

                foreach ([$i1, $i2, $i3] as $img) {
                    $img->reference_id = $venues->id;
                    $img->save();
                }
            }

            $imageIds = [];

            if ($request->hasFile('turf_images')) {
                foreach ($request->file('turf_images') as $image) {
                    $filename = time() . '_' . $image->getClientOriginalName();
                    $image->storeAs('public/turf_images', $filename);

                    $img = new Images();
                    $img->image_name = $filename;
                    $img->image_path = 'turf_images/' . $filename;
                    $img->reference_name = 'venues';
                    $img->reference_id = $venues->id;
                    $img->save();

                    $imageIds[] = $img->id;
                }

                $venues->turf_image = $imageIds;
                $venues->save();
            }

            return response()->json(['success' => 'Venue saved successfully.']);
        } catch (\Illuminate\Validation\ValidationException $ex) {
            return response()->json(['errors' => $ex->errors()], 422);
        } catch (\Exception $e) {
            \Log::error('Vendor store error: ' . $e->getMessage());
            return response()->json([
                'error' => $e->getMessage(),
                'line' => $e->getLine(),
            ], 500);
        }
    }

    private function saveImage($file, $referenceId = 0)
    {
        $filename = time() . '_' . $file->getClientOriginalName();
        $filepath = $file->storeAs('admin_image', $filename, 'public');

        $image = new Images();
        $image->image_name = $filename;
        $image->image_path = $filepath;
        $image->reference_name = 'venues';
        $image->reference_id = $referenceId;
        $image->save();

        return $image;
    }
    public function delete(Request $request)
    {
        $search = $request->search;

        $venue = Venues::find($request->id);

        $imageIds = [
            'pancard' => $venue->pancard,
            'aadhaar' => $venue->Aadhaar_card,
            'profile' => $venue->vendor_image,
        ];

        $venue->delete();

        foreach ($imageIds as $id) {
            $image = Images::find($id);
            if ($image) {
                Storage::disk('public')->delete($image->image_path ?? '');
                $image->delete();
            }
        }
        return redirect()->route('vendor.index', ['search' => $search]);
    }
    public function approve(Request $r)
    {
        $user = auth()->user();
        $vendor = Venues::find($r->id);
        if (!$vendor) return response()->json(['success' => false, 'message' => 'Venue not found.'], 404);
        if ($user->role_id == 2) {
            $vendors = DB::table('users')->find($vendor->created_by);
            if (!$vendors || $vendors->created_by != $user->id)
                return response()->json(['success' => false, 'message' => 'Unauthorized action.'], 403);
        }
        $vendor->status = 2; 
        $vendor->save();
        return response()->json(['success' => true, 'message' => 'Venue approved successfully.']);
    }


   public function disapprove(Request $request)
    {
        $user = auth()->user();
        $vendor = Venues::find($request->id);
        if (!$vendor) return response()->json(['success' => false, 'message' => 'Venue not found.'], 404);
        if ($user->role_id == 2) {
            $vendors = DB::table('users')->find($vendor->created_by);
            if (!$vendors || $vendors->created_by != $user->id)
                return response()->json(['success' => false, 'message' => 'Unauthorized action.'], 403);
        }
        $vendor->status = 0; 
        $vendor->save();
        return response()->json(['success' => true, 'message' => 'Vendor disapproved.']);
    }

    public function view(Request $request, $id)
    {
        try {
            $id = decrypt($id);
        } catch (DecryptException $e) {
            abort(404, 'Invalid Vendor ID');
        }

        $user = auth()->user();
        $vendor = Venues::leftJoin('city', 'venues.city_id', '=', 'city.id')
            ->leftJoin('area_code', 'venues.area_id', '=', 'area_code.id')
            ->select('venues.*', 'city.city_name as city_name', 'city.id as city_id', 'area_code.area as area_name', 'area_code.id as area_id')
            ->where('venues.id', $id)->firstOrFail();

        if ($user->role_id == 2 && !DB::table('users')->where('role_id', 3)->where('created_by', $user->id)->pluck('id')->contains($vendor->created_by))
            abort(403, 'Unauthorized access.');
        if ($user->role_id == 3 && $vendor->created_by != $user->id)
            abort(403, 'Unauthorized access.');

        $imgIds = is_array($vendor->turf_image) ? $vendor->turf_image : explode(',', $vendor->turf_image ?? '');
        $imgIds = array_filter([$vendor->vendor_image, $vendor->pancard, $vendor->Aadhaar_card, ...$imgIds]);
        $imgs = DB::table('images')->whereIn('id', $imgIds)->get()->keyBy('id');

        $vendor->vendor_image_data = $imgs[$vendor->vendor_image] ?? null;
        $vendor->pancard_image_data = $imgs[$vendor->pancard] ?? null;
        $vendor->aadhaar_image_data = $imgs[$vendor->Aadhaar_card] ?? null;
        $vendor->turf_images = collect($imgIds)->map(fn($id) => $imgs[(int)$id] ?? null)->filter();

        $city = DB::table('city')->get();
        $area = $request->city ? Area::where('city_id', $request->city)->get() : Area::all();

        return view('admin.venues.view', compact('vendor', 'user', 'city', 'area'));
    }

}
