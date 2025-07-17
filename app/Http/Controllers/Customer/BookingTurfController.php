<?php

namespace App\Http\Controllers\Customer;

use App\Models\Booking;
use Carbon\Carbon;
use App\Models\Turf;
use App\Models\Images;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookingTurfController extends Controller
{
    public function index(Request $request)
    {
        $bookedTurfIds = [];

        if ($request->has(['date', 'time']) && $request->date && $request->time) {
            try {
                $date = Carbon::createFromFormat('d/m/Y', $request->date)->format('Y-m-d');
                $time = Carbon::createFromFormat('h:i A', $request->time)->format('H:i:s');
            } catch (\Exception $e) {
                return back()->with('error', 'Invalid date/time format.');
            }

            $bookedTurfIds = Booking::whereDate('booking_on', $date)
                ->whereTime('time_in', '<=', $time)
                ->whereTime('time_out', '>', $time)
                ->pluck('turf_id')
                ->toArray();
        }

        $turfs = Turf::where('status', 2)
                ->when(count($bookedTurfIds), function ($query) use ($bookedTurfIds) {
                    $query->whereNotIn('id', $bookedTurfIds);
                })
                ->get();

        foreach ($turfs as $turf) {
            $turf->venue_name = optional($turf->venue)->owner_name ?? 'Unknown Venue';

            $imageIds = json_decode($turf->turf_image, true) ?? [];
            $turf->turf_images = Images::whereIn('id', $imageIds)->get();

            $turf->first_image = $turf->turf_images->first();
        }

        return view('customer.bookingturf.bookingturf', compact('turfs'));
    }
    public function product($id)
    {
        $turf = Turf::with('venue')->findOrFail($id);

        $imageIds = json_decode($turf->turf_image ?? '[]');
        $turf->turf_images = Images::whereIn('id', $imageIds)->get();
        $turf->first_image = $turf->turf_images->first();

        $amenityIds = json_decode($turf->amenities_ids ?? '[]');
        $amenities = \App\Models\Amenity::whereIn('id', $amenityIds)->get();

        foreach ($amenities as $amenity) {
            $imgId = $amenity->image_id;
            $amenity->image_data = Images::find($imgId);
        }

        return view('customer.productlanding.productlanding', compact('turf', 'amenities'));
    }

}
