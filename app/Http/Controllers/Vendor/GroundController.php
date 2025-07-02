<?php

namespace App\Http\Controllers\Vendor;

use App\Models\Turf;
use App\Models\Unit;
use App\Models\Images;
use App\Models\Sports;
use App\Models\Amenity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class GroundController extends Controller
{
    public function index()
    {
        $vendorId = auth('vendor')->id();
        $units = Unit::all();
        $turfs = Turf::where('created_by', $vendorId)->get();

        foreach ($turfs as $turf) {
            $sportIds = json_decode($turf->sports_ids, true) ?? [];
            $turf->sports_data = Sports::with('image')->whereIn('id', $sportIds)->get();
            $amenityIds = json_decode($turf->amenities_ids, true) ?? [];
            $turf->amenity_data = Amenity::with('image')->whereIn('id', $amenityIds)->get();
            $turfImageIds = json_decode($turf->turf_image, true) ?? [];
            $turf->turf_images = Images::whereIn('id', $turfImageIds)->get();
        }

        $allSports = Sports::all();
        $allAmenities = Amenity::all();

        return view('vendor.ground.ground', compact('turfs', 'allSports', 'allAmenities', 'units'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'turfs.*.name' => 'required|string',
            'turfs.*.location_link' => 'required|string',
            'turfs.*.location_text' => 'required|string',
            'turfs.*.description' => 'nullable|string',
            'turfs.*.height' => 'required|numeric',
            'turfs.*.width' => 'required|numeric',
            'turfs.*.length' => 'required|numeric',
            'turfs.*.booking_price' => 'required|numeric',
            // 'turfs.*.unit' => 'required',
            'turfs.*.sports' => 'array',
            'turfs.*.amenities' => 'array',
            'turfs.*.turf_images.*' => 'image|mimes:jpeg,png,jpg,webp',
            'removed_existing_images' => 'array',
            'removed_existing_images.*' => 'integer|exists:images,id',
        ], [
            'turfs.*.name.required' => 'The turf name field is required.',
            'turfs.*.name.string' => 'The turf name must be a valid string.',
            'turfs.*.location_link.required' => 'The location link field is required.',
            'turfs.*.location_link.string' => 'The location link must be a valid string.',
            'turfs.*.location_text.required' => 'The location text field is required.',
            'turfs.*.location_text.string' => 'The location text must be a valid string.',
            'turfs.*.description.string' => 'The description must be a valid string.',
            'turfs.*.height.required' => 'The height field is required.',
            'turfs.*.height.numeric' => 'The height must be a number.',
            'turfs.*.width.required' => 'The width field is required.',
            'turfs.*.width.numeric' => 'The width must be a number.',
            'turfs.*.length.required' => 'The length field is required.',
            'turfs.*.length.numeric' => 'The length must be a number.',
            'turfs.*.booking_price.required' => 'The booking price field is required.',
            'turfs.*.booking_price.numeric' => 'The booking price must be a number.',
            // 'turfs.*.unit.required' => 'The unit field is required.',
            'turfs.*.sports.array' => 'The sports field must be a valid list.',
            'turfs.*.amenities.array' => 'The amenities field must be a valid list.',
            'turfs.*.turf_images.*.image' => 'Each image must be a valid image file.',
            'turfs.*.turf_images.*.mimes' => 'Images must be in jpeg, png, jpg, or webp format.',
        ]);

        if ($validator->fails()) {
            return $request->ajax()
                ? response()->json(['errors' => $validator->errors()], 422)
                : redirect()->back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();
        try {
            $removedSportIds = json_decode($request->input('removed_sport_ids'), true) ?? [];
            $removedAmenityIds = json_decode($request->input('removed_amenity_ids'), true) ?? [];

            foreach ($request->turfs as $index => $turfData) {
                $turf = null;
                $turfImageIDs = [];
                $sportIDs = $turfData['sports'] ?? [];
                $amenityIDs = $turfData['amenities'] ?? [];

                if (!empty($turfData['id'])) {
                    $turf = Turf::find($turfData['id']);
                    $removedSportIds = $turfData['removed_sports'] ?? [];
                    $removedAmenityIds = $turfData['removed_amenities'] ?? [];

                    if ($turf && $turf->sports_ids) {
                        $existingSportIDs = array_diff(json_decode($turf->sports_ids, true) ?? [], $removedSportIds);
                        $sportIDs = array_unique(array_merge($existingSportIDs, $sportIDs));
                    }
                    if ($turf && $turf->amenities_ids) {
                        $existingAmenityIDs = array_diff(json_decode($turf->amenities_ids, true) ?? [], $removedAmenityIds);
                        $amenityIDs = array_unique(array_merge($existingAmenityIDs, $amenityIDs));
                    }
                }

                $turfImageIDs = $turfData['existing_images'] ?? [];
                if ($request->hasFile("turfs.$index.turf_images")) {
                    foreach ($request->file("turfs.$index.turf_images") as $img) {
                        $path = $img->store('turf_images', 'public');
                        $image = Images::create([
                            'image_name' => $img->getClientOriginalName(),
                            'image_path' => $path,
                            'reference_name' => 'turf',
                            'reference_id' => 0,
                        ]);
                        $turfImageIDs[] = $image->id;
                    }
                }

                $turfDataArray = [
                    'name' => $turfData['name'] ?? '',
                    'location_link' => $turfData['location_link'] ?? '',
                    'location_text' => $turfData['location_text'] ?? '',
                    'description' => $turfData['description'] ?? '',
                    'height' => $turfData['height'] ?? 0,
                    'width' => $turfData['width'] ?? 0,
                    'length' => $turfData['length'] ?? 0,
                    'booking_price' => $turfData['booking_price'] ?? 0,
                    'unit' => $turfData['unit'] ?? 'Hour',
                    'turf_image' => json_encode($turfImageIDs),
                    'sports_ids' => json_encode($sportIDs),
                    'amenities_ids' => json_encode($amenityIDs),
                ];

                if ($turf) {
                    $turf->update($turfDataArray);
                } else {
                    $turfDataArray['created_by'] = auth('vendor')->id();
                    $turf = Turf::create($turfDataArray);
                }

                Images::whereIn('id', $turfImageIDs)->update([
                    'reference_name' => 'turf',
                    'reference_id' => $turf->id,
                ]);
            }

            $removedImageIds = $request->input('removed_existing_images', []);
            if (!empty($removedImageIds)) {
                $images = Images::whereIn('id', $removedImageIds)->get();
                foreach ($images as $image) {
                    Storage::disk('public')->delete($image->image_path);
                    $image->delete();
                }
            }

            DB::commit();
            return redirect()->back()->with('success', 'Turfs saved successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Turf store error: ' . $e->getMessage() . ' at line ' . $e->getLine());
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    
}
