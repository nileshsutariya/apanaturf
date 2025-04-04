<?php

namespace App\Http\Controllers\API\User;

use App\Models\Images;
use App\Models\Sports;
use Illuminate\Http\Request;
use Intervention\Image\Image;
use App\Http\Controllers\Controller;

class ConfigurationController extends Controller
{
    public function addSports(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'image' => 'required|image|mimes:jpeg,png,jpg',
    ]);

    // Get the image
    $imageFile = $request->file('image');
    $image = Image::make($imageFile);

    if ($image->width() !== 150 || $image->height() !== 150) {
        return response()->json([
            'error' => 'Image must be exactly 150x150 pixels.'
        ], 422);
    }

    // Proceed to save
    $imageName = time() . '_' . $imageFile->getClientOriginalName();
    $imagePath = 'admin_images/' . $imageName;

    $image->save(public_path($imagePath)); // Save without resizing

    // Store in images table
    $savedImage = Images::create([
        'image_name' => $imageName,
        'image_path' => $imagePath,
        'reference_name' => 'sports',
        'reference_id' => null,
    ]);

    // Store in sports table
    Sports::create([
        'name' => $request->name,
        'image_id' => $savedImage->id,
    ]);

    return response()->json(['message' => 'Sport added with valid image.']);
}
    

}
