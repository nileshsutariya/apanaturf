<?php

namespace App\Http\Controllers\admin;

use App\Models\Area;
use App\Models\Images;
use App\Models\Venues;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class VenuesController extends Controller
{
    public function index(Request $request)
    {
        $venues = Venues::leftJoin('city', 'venues.city_id', '=', 'city.id')
            ->leftJoin('area_code', 'venues.area_id', '=', 'area_code.id')
            ->where('city.city_name', 'like', '%' . $request->search . '%')
            ->orWhere('area_code.area', 'like', '%' . $request->search . '%')
            ->orWhere('owner_phone', 'like', '%' . $request->search . '%')
            ->select( 'venues.*', 'city.city_name as city_name', 'city.id as city_id', 'area_code.area as area_name', 'area_code.id as area_id' )
            ->paginate(10);

        $city = DB::table('city')->get();
        $area = $request->city ? Area::where('city_id', $request->city)->get() : Area::all();
        return view('admin.venues.venues', compact('venues', 'city', 'area'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'city' => 'required',
            'area' => 'required',
            'location_text' => 'required',
            'location_link' => 'required',
            'vendor_id' => 'required|unique:venues,vendor_ID' . ($request->id ? ',' . $request->id : ''),
            'profile_image' => $request->id ? 'nullable' : 'required',
            'pancard_image' => $request->id ? 'nullable' : 'required',
            'aadhaar_image' => $request->id ? 'nullable' : 'required',
            'mobileno' => 'required|unique:venues,owner_phone' . ($request->id ? ',' . $request->id : ''),
            'email' => 'required|email|unique:venues,owner_email' . ($request->id ? ',' . $request->id : ''),
        ])->validate();

        // print_r($request->all());
        // die;

        $venues = $request->id ? venues::find($request->id) : new venues();
        $venues->owner_phone = $request->mobileno;
        $venues->password = $request->mobileno;
        $venues->owner_email = $request->email;
        $venues->owner_name = $request->name;
        $venues->vendor_ID = $request->vendor_id;
        // $venues->balance = $request->balance;
        $venues->city_id = $request->city;
        $venues->area_id = $request->area;
        $venues->status = $request->status == 'on' ? 1 : 0;
        $venues->location_link = $request->location_link;
        $venues->location_text = $request->location_text;

        if ($request->id == null) {
            function saveImage($file, $referenceId = 0)
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

            $i1 = saveImage($request->profile_image);
            $i2 = saveImage($request->pancard_image);
            $i3 = saveImage($request->aadhaar_image);

            $venues->vendor_image = $i1->id;
            $venues->pancard = $i2->id;
            $venues->Aadhaar_card = $i3->id;
            $venues->save();

            foreach ([$i1, $i2, $i3] as $img) {
                $img->reference_id = $venues->id;
                $img->save();
            }
        } else {
            $venues->save();
        }
        return redirect()->route('venues.index');

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
        return redirect()->route('venues.index', ['search' => $search]);
    }
}
