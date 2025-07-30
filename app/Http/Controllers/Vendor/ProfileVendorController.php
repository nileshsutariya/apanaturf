<?php

namespace App\Http\Controllers\Vendor;

use App\Models\Images;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


class ProfileVendorController extends Controller
{
    public function index()
    {
        $vendor = auth('vendor')->user()->load('image');
        // print_r($vendor); die;
        return view('vendor.profile.profile', compact('vendor'));
    }
    public function store(Request $request)
    {
        $vendor = auth('vendor')->user();

        $validated = $request->validate([
            'owner_name'      => 'required|string',
            'owner_email'     => 'required|email',
            'owner_phone'     => 'required|digits:10',
            'vendor_image'   => 'nullable|image|mimes:jpg,jpeg,png',
        ]);

        $vendor->update([
            'owner_name'  => $validated['owner_name'],
            'owner_email' => $validated['owner_email'],
            'owner_phone' => $validated['owner_phone'],
        ]);

        if ($request->hasFile('vendor_image')) {

            if ($vendor->image) {
                \DB::table('venues')->where('vendor_image', $vendor->image->id)->update(['vendor_image' => null]);
                Storage::disk('public')->delete($vendor->image->image_path);
                $vendor->image->delete();
            }

            $file = $request->file('vendor_image');
            $path = $file->store('vendor_images', 'public');
            $originalName = $file->getClientOriginalName();

            $image = Images::create([
                'image_name'     => $originalName,
                'reference_name' => 'vendor',
                'reference_id'   => $vendor->id,
                'image_path'     => $path,
            ]);
            $vendor->vendor_image = $image->id;
                $vendor->save();
            }

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

}
