<?php

namespace App\Http\Controllers\admin;

use App\Models\Banner;
use App\Models\Images;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BannerController extends Controller
{
    public function index(Request $request)
    {
        $banner = Banner::leftJoin('images', 'banner.image_id', '=', 'images.id')
                        ->select('banner.*', 'images.image_path')
                        ->get();
        if ($request->ajax()) {
            return view('admin.banner.banner', compact('banner'))->render();
        } else {
            return view('admin.banner.banner', ['banner' => $banner]);
        }
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'event_id' => 'required',
            'banner_image' => 'required|image',
        ])->validate();

        $file = $request->banner_image;

        $filename = time() . '_' . $file->getClientOriginalName();
        $filepath = $file->storeAs('admin_image', $filename, 'public');

        $i = new Images();
        $i->image_name = $filename;
        $i->image_path = $filepath;
        $i->reference_name = 'banners';
        $i->reference_id = 0;
        $i->save();

        $banner = new banner();
        $banner->image_id = $i->id;
        $banner->event_id=$request->event_id;
        $banner->save();

        $i = Images::find($i->id);
        $i->reference_id = $banner->id;
        $i->save();

        return redirect()->route('banners.index');
    }

    public function delete(Request $request)
    {
        $banner = banner::find($request->id);
        $image = Images::find($banner->image_id);
        $banner->delete();
        
        if ($image) {
            if (Storage::disk('public')->exists($image->image_path)) {
                Storage::disk('public')->delete($image->image_path);
            }
            $image->delete();
        }
        return response()->json(['success' => true]);
    }

}
