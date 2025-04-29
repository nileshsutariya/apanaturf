<?php

namespace App\Http\Controllers\API\User;

use App\Models\Banner;
use App\Models\Images;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\API\BaseController;

class BannersController extends BaseController
{
    public function list(Request $request)
    {
            $query =Banner::join('images', 'banner.image_id', '=', 'images.id')
                ->select('banner.id', 'images.image_name');
    
            $validator = Validator::make($request->all(), [ 
                'filter_param.id' => 'nullable|exists:banner,id',
                'order.column' => 'nullable|string|in:name,id',
                'order.dir' => 'nullable|string|in:asc,desc',
            ]);
    
            if ($validator->fails()) {
                return $this->senderror(['errors' => $validator->errors()->all()]);
            }
    
            if ($request->has('filter_param.id') && !empty($request->input('filter_param.id'))) {
                $query->where('banner.id', $request->input('filter_param.id'));
            }
    
            if (!empty($request->input('search.value'))) {
                $searchValue = $request->input('search.value');
                $query->where(function($q) use ($searchValue) {
                    $q->where('images.image_name', 'LIKE', "%{$searchValue}%");
                });
            }
    
            $sortColumn = $request->input('order.column', 'banner.id'); 
            $sortDirection = $request->input('order.dir', 'asc');
    
            $query->orderBy($sortColumn, $sortDirection);
    
            $start = $request->input('start', 0);
            $length = $request->input('length', 10);
    
            $data = $query->offset($start)->limit($length)->get();
    
        return $this->sendresponse($data, 'banner list');
    }
    
 
    public function store(Request $request)
    {
        // Validate dimensions and file type
        $validator = Validator::make($request->all(), [
            'image_id' => 'required|image|dimensions:width=500,height=250', 
        ], [
            'image_id.dimensions' => 'The image must be exactly 500x250 pixels.',
        ]);
    
        if ($validator->fails()) {
            return $this->senderror(['errors' => $validator->errors()->all()]);
        }
    
        $image_id = null;
    
        if ($request->hasFile('image_id')) {
            
            $file = $request->file('image_id');
            
            [$width, $height] = getimagesize($file);
    
            if ($width != 500 || $height != 250) {
                return $this->senderror('', 'Image must be exactly 500x250 pixels.');
            }
            $mime = $file->getMimeType();
            $path = $file->getPathname();
            
            // Only check transparency if it's PNG or WebP
            $imageResource = null;
            if ($mime === 'image/png') {
                $imageResource = imagecreatefrompng($path);
            } elseif ($mime === 'image/webp') {
                $imageResource = imagecreatefromwebp($path);
            }
            
            if ($imageResource) {
                $hasTransparency = false;
                for ($x = 0; $x < $width; $x++) {
                    for ($y = 0; $y < $height; $y++) {
                        $rgba = imagecolorat($imageResource, $x, $y);
                        $alpha = ($rgba & 0x7F000000) >> 24;
                        
                        if ($alpha > 0) {
                            $hasTransparency = true;
                            break 2; // break both loops
                        }
                    }
                }
                
                imagedestroy($imageResource);
                
                if (!$hasTransparency) {
                    return $this->senderror('', 'Please remove the background from the image before uploading (transparency required).');
                }
            }
            
            // Save the image
            $filename = time() . '_' . $file->getClientOriginalName();
            $filepath = $file->storeAs('admin_image', $filename, 'public');
            $image = Images::create([
                'image_name'     => $filename,
                'image_path'     => $filepath,
                'reference_name' => 'banner',
                'reference_id'   => 0,
            ]);
            
            $image_id = $image->id;
        }
        
        // Create banner using helper
        $banner = Banner::createbanner($image_id);
    
        return $this->sendresponse($banner, 'Banner added successfully');
    }
    
    public function delete(Request $request){
        $response = Banner::deletesport($request->id);

        if (!$response) {
            return $this->senderror('', 'Sport not found');
        }

        return $this->sendresponse([], $response['message']);    
    }

}

