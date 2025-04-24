<?php

namespace App\Http\Controllers\admin\sport;

use App\Models\Sport;
use App\Models\Images;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Storage;


class SportsController extends Controller
{
    public function index(Request $request)
    {
        $sport = Sport::leftJoin('images', 'sports.image_id', '=', 'images.id')
            ->select('sports.*', 'images.image_path')->get();
        if ($request->ajax()) {
            return view('new.admin.sports.sports', compact('sport'))->render();
        } else {
            return view('new.admin.sports.sports', ['sport' => $sport]);
        }
    }

    public function update(Request $request)
    {

        // print_r($request->all());die;

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'sport_image' => 'required|image|dimensions:width=150,height=150',
        ], [
            'sport_image.dimensions' => 'The image must be exactly 150x150 pixels.',
        ])->validate();

        $file = $request->sport_image;
        $path = $file->getRealPath();
        $mime = $file->getMimeType();

        $hasTransparency = false;

        //backgroud check mate
        if (in_array($mime, ['image/png', 'image/jpg', 'image/webp', 'image/jpeg', 'image/svg'])) {
            $image = null;

            if ($mime === 'image/png') {
                $image = imagecreatefrompng($path);
            } elseif ($mime === 'image/jpg') {
                $image = imagecreatefromjpg($path);
            } elseif ($mime === 'image/jpeg') {
                $image = imagecreatefromjpeg($path);
            } elseif ($mime === 'image/webp') {
                $image = imagecreatefromwebp($path);
            } elseif ($mime === 'image/svg') {
                $image = imagecreatefromsvg($path);
            }

            if ($image) {
                $width = imagesx($image);
                $height = imagesy($image);

                for ($x = 0; $x < $width; $x++) {
                    for ($y = 0; $y < $height; $y++) {
                        $rgba = imagecolorat($image, $x, $y);
                        $alpha = ($rgba & 0x7F000000) >> 24;
                        if ($alpha > 0) {
                            $hasTransparency = true;
                            break 2;
                        }
                    }
                }

                imagedestroy($image);

                if (!$hasTransparency) {
                    throw ValidationException::withMessages([
                        'image' => ['Please upload an image with a transparent background.'],
                    ]);
                }
            }
        }

        // Store image in public/storage/admin_images

        $filename = time() . '_' . $file->getClientOriginalName();
        $filepath = $file->storeAs('admin_image', $filename, 'public');

        $image = Images::create([
            'image_name' => $filename,
            'image_path' => $filepath,
            'reference_name' => 'sports',
            'reference_id' => 0,
        ]);

        $i = new Images();
        $i->image_name = $filename;
        $i->image_path = $filepath;
        $i->reference_name = 'sports';
        $i->reference_id = 0;
        $i->save();

        $sport = new Sport();
        $sport->name = $request->name;
        $sport->image_id = $i->id;
        $sport->save();

        $i = Images::find($i->id);
        $i->reference_id = $sport->id;
        $i->save();

        return redirect()->route('sport.index');

    }

    public function delete(Request $request){
        // print_r($request->id);die;
        $sport = Sport::find($request->id);
        $image = Images::find($sport->image_id);
        $sport->delete();
    
        if ($image) {
            if (Storage::disk('public')->exists($image->image_path)) {
                Storage::disk('public')->delete($image->image_path);
            }
            $image->delete();
        }
        return redirect()->route('sport.index');
    }
}
