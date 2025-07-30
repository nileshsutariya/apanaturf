<?php

namespace App\Http\Controllers\Customer;

use App\Models\Images;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    public function index()
    {
        $customer = auth('customer_web')->user();
        return view('customer.settings.setting', compact('customer'));
    }
    public function store(Request $request)
    {
        $customer = auth('customer_web')->user();

        $validated = $request->validate([
            'name'      => 'required|string',
            'email'     => 'required|email',
            'phone'     => 'required|digits:10',
            'profile_image'   => 'nullable|image|mimes:jpg,jpeg,png',
            'oldpassword'   => 'nullable|required_with:newpassword|string',
            'newpassword'   => 'nullable|string|min:6',
        ]);

        $customer->update([
            'name'  => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
        ]);

        if (!empty($validated['newpassword'])) {
            if (!Hash::check($validated['oldpassword'], $customer->password)) {
                return back()->withErrors(['oldpassword' => 'Old password is incorrect.']);
            }

            $customer->update([
                'password' => Hash::make($validated['newpassword']),
                'password_updated' => now(),
            ]);
        }

        if ($request->hasFile('profile_image')) {

            if ($customer->image) {
                \DB::table('customer')->where('profile_image', $customer->image->id)->update(['profile_image' => null]);
                Storage::disk('public')->delete($customer->image->image_path);
                $customer->image->delete();
            }

            $file = $request->file('profile_image');
            $path = $file->store('profile_images', 'public');
            $originalName = $file->getClientOriginalName();

            $image = Images::create([
                'image_name'     => $originalName,
                'reference_name' => 'customer',
                'reference_id'   => $customer->id,
                'image_path'     => $path,
            ]);
            $customer->profile_image = $image->id;
                $customer->save();
            }

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

}
