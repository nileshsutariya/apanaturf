<?php

namespace App\Http\Controllers\admin;

use App\Models\Turf;
use App\Models\Images;
use App\Models\Sports;
use App\Models\Venues;
use App\Models\Amenity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Encryption\DecryptException;

class TurfController extends Controller
{
    public function index()
    {
        $userId = auth()->id();
        $venueIds = Venues::where('created_by', $userId)->pluck('id');
        $turfs = Turf::with('venue')->whereIn('vendor_id', $venueIds)->get();

        foreach ($turfs as $turf) {
            $turf->venue_name = optional($turf->venue)->owner_name ?? 'Unknown Venue';
            $turf->sports_data = Sports::with('image')->whereIn('id', json_decode($turf->sports_ids, true) ?? [])->get();
            $turf->amenities_data = Amenity::with('image')->whereIn('id', json_decode($turf->amenities_ids, true) ?? [])->get();
            $turf->turf_images = Images::whereIn('id', json_decode($turf->turf_image, true) ?? [])->get();
        }

        return view('admin.turf.turf', compact('userId', 'venueIds', 'turfs'));
    }
    public function view($id)
    {
        try {
            $id = decrypt($id);
        } catch (DecryptException $e) {
            abort(404, 'Invalid Vendor ID');
        }
        $userId = auth()->id();
        $venueIds = Venues::where('created_by', $userId)->pluck('id');
        $turfs = Turf::with(['venue', 'timings'])->where('id', $id)->whereIn('vendor_id', $venueIds)->get();

        foreach ($turfs as $turf) {
            $turf->venue_name = optional($turf->venue)->owner_name ?? 'Unknown Venue';
            $turf->sports_data = Sports::with('image')->whereIn('id', json_decode($turf->sports_ids, true) ?? [])->get();
            $turf->amenities_data = Amenity::with('image')->whereIn('id', json_decode($turf->amenities_ids, true) ?? [])->get();
            $turf->turf_images = Images::whereIn('id', json_decode($turf->turf_image, true) ?? [])->get();
        }

        return view('admin.turf.view', compact('userId', 'turfs'));
    }

    public function approve(Request $request)
    {
        $user = auth()->user();
        $turf = Turf::find($request->id);
        if (!$turf) return response()->json(['success' => false, 'message' => 'Turf not found.'], 404);
        if ($user->role_id == 2) {
            $v = DB::table('users')->find($turf->created_by);
            if (!$v || $v->created_by != $user->id)
                return response()->json(['success' => false, 'message' => 'Unauthorized action.'], 403);
        }
        $turf->status = 2; 
        $turf->save();
        return response()->json(['success' => true, 'message' => 'Venue approved successfully.']);
    }

    public function disapprove(Request $request)
    {
        $user = auth()->user();
        $turf = Turf::find($request->id);
        if (!$turf) return response()->json(['success' => false, 'message' => 'Turf not found.'], 404);
        if ($user->role_id == 2) {
            $v = DB::table('users')->find($turf->created_by);
            if (!$v || $v->created_by != $user->id)
                return response()->json(['success' => false, 'message' => 'Unauthorized action.'], 403);
        }
        $turf->status = 0; 
        $turf->save();
        return response()->json(['success' => true, 'message' => 'Vendor disapproved.']);
    }

}
