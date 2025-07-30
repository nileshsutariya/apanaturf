<?php

namespace App\Http\Controllers\admin;

use App\Models\Area;
use App\Models\City;
use App\Models\Images;
use App\Models\RoleType;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $roles = RoleType::all();
        $cities = City::all();
        $areas = Area::all()->groupBy('city_id');

        return view('admin.profile.profile', compact('user', 'roles', 'cities', 'areas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string',
            'email'    => 'required|email|unique:users,email,' . Auth::id(),
            'phone'    => 'required|string|max:10',
            'role_id'  => 'nullable|exists:role_type,id',
            'city_id'  => 'nullable|exists:city,id',
            'area_id'  => 'nullable|exists:area,id',
        ]);
        // print_r($request->all()); die;
        
        $user = Auth::user();
        $user->update([
            'name'    => $request->name,
            'email'   => $request->email,
            'phone'   => $request->phone,
            'role_id' => $request->role_id,
            'city_id' => $request->city_id,
            'area_id' => $request->area_id,
        ]);

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
    public function update(Request $request)
    {
        $request->validate([
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();
        $file = $request->file('profile_image');
        $filename = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('profile_images', $filename, 'public');

        if ($user->profile_image) {
            $existingImage = Images::find($user->profile_image);
            if ($existingImage) {
                Storage::disk('public')->delete($existingImage->image_path);

                $existingImage->update([
                    'image_name' => $filename,
                    'image_path' => $path,
                ]);
            } else {
                $existingImage = Images::create([
                    'image_name'     => $filename,
                    'image_path'     => $path,
                    'reference_name' => 'user',
                    'reference_id'   => $user->id,
                ]);
            }
            $imageId = $existingImage->id;
        } else {
            $newImage = Images::create([
                'image_name'     => $filename,
                'image_path'     => $path,
                'reference_name' => 'user',
                'reference_id'   => $user->id,
            ]);
            $imageId = $newImage->id;
        }

        $user->update([
            'profile_image' => $imageId,
        ]);

        return redirect()->back()->with('success', 'Profile photo updated successfully.');
    }
    public function delete(Request $request)
    {
        $user = Auth::user();

        if ($user->profile_image) {
            $image = Images::find($user->profile_image);

            if ($image) {
                $user->update(['profile_image' => null]);
                Storage::disk('public')->delete($image->image_path);
                $image->delete();
            }
        }

        return redirect()->back()->with('success', 'Profile photo removed successfully.');
    }

}
