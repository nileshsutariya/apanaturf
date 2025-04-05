<?php

namespace App\Http\Controllers\API\User;

use App\Models\Images;
use App\Models\Sports;
use App\Models\Amenities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\API\BaseController;

class ConfigurationController extends BaseController
{
    public function sportlist(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'filter_param.id' => 'nullable|exists:sports,id',
            'order.column' => 'nullable|string|in:name,id',
            'order.dir' => 'nullable|string|in:asc,desc',
        ]);

        if ($validator->fails()) {
            return $this->senderror(['errors' => $validator->errors()->all()]);
        }

        $query = Sports::sportslist();

        if ($request->has('filter_param.id') && !empty($request->input('filter_param.id'))) {
            $query->where('sports.id', $request->input('filter_param.id'));
        }


        if (!empty($request->input('search.value'))) {
            $searchValue = $request->input('search.value');
            $query->where(function($q) use ($searchValue) {
                $q->where('sports.name', 'LIKE', "%{$searchValue}%")
                ->orWhere('images.image_name', 'LIKE', "%{$searchValue}%");
            });
        }

        $sortColumn = $request->input('order.column', 'sports.id'); 
        $sortDirection = $request->input('order.dir', 'asc');

        $query->orderBy($sortColumn, $sortDirection);

        $start = $request->input('start', 0);
        $length = $request->input('length', 10);

        $data = $query->offset($start)->limit($length)->get();

        return $this->sendresponse($data, 'Sports list');
    }

    public function addsports(Request $request) 
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'image_id' => 'required|image|dimensions:max_height=150,min_height=150,max_width=150,min_width=150', 
        ], [
            'image_id.dimensions' => 'The image must be exactly 150x150 pixels.',
        ]);
        
        if ($validator->fails()) {
            return $this->senderror(['errors' => $validator->errors()->all()]);
        }

        if ($request->hasFile('image_id')) {
            $file = $request->file('image_id');


            [$width, $height] = getimagesize($file);

            if ($width != 150 || $height != 150) {
                return $this->senderror('', 'Image must be exactly 150x150 pixels.');
            }


            
            $imageResource = imagecreatefrompng($file->getPathname());

            $hasTransparency = false;
            for ($x = 0; $x < $width; $x++) {
                for ($y = 0; $y < $height; $y++) {
                    $rgba = imagecolorat($imageResource, $x, $y);
                    $alpha = ($rgba & 0x7F000000) >> 24;

                    if ($alpha > 0) {
                        $hasTransparency = true;
                        break 2; // Break both loops if transparency found
                    }
                }
            }

            imagedestroy($imageResource); // Clean up

            if (!$hasTransparency) {
                return $this->senderror('', 'Please remove the background from the image before uploading (transparency required).');
            }



            $filename = time() . '_' . $file->getClientOriginalName();
            $filepath = $file->storeAs('admin_image', $filename, 'public');

            $image = Images::create([
                'image_name' => $filename,
                'image_path' => $filepath,
                'reference_name' => 'sports',
                'reference_id' => 0, 
            ]);

            $image_id = $image->id;
        }

        $sports = Sports::storesport($request->name, $image_id ?? null);


        return $this->sendresponse($sports, 'Sports added successfully');
    
    }
    public function sportdelete(Request $request)
    {
        $response = Sports::deletesport($request->id);

        if (!$response) {
            return $this->senderror('', 'Sport not found');
        }

        return $this->sendresponse([], $response['message']);
    }

    public function amenitieslist(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'filter_param.id' => 'nullable|exists:amenities,id',
            'order.column' => 'nullable|string|in:name,id',
            'order.dir' => 'nullable|string|in:asc,desc',
        ]);

        if ($validator->fails()) {
            return $this->senderror(['errors' => $validator->errors()->all()]);
        }

        $query = Amenities::amenitieslist();

        if ($request->has('filter_param.id') && !empty($request->input('filter_param.id'))) {
            $query->where('amenities.id', $request->input('filter_param.id'));
        }


        if (!empty($request->input('search.value'))) {
            $searchValue = $request->input('search.value');
            $query->where(function($q) use ($searchValue) {
                $q->where('amenities.name', 'LIKE', "%{$searchValue}%")
                ->orWhere('images.image_name', 'LIKE', "%{$searchValue}%");
            });
        }

        $sortColumn = $request->input('order.column', 'amenities.id'); 
        $sortDirection = $request->input('order.dir', 'asc');

        $query->orderBy($sortColumn, $sortDirection);

        $start = $request->input('start', 0);
        $length = $request->input('length', 10);

        $data = $query->offset($start)->limit($length)->get();

        return $this->sendresponse($data, 'Amenities list');
    }

    public function addamenities(Request $request) 
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'image_id' => 'required|image|dimensions:max_height=150,min_height=150,max_width=150,min_width=150', 
        ], [
            'image_id.dimensions' => 'The image must be exactly 150x150 pixels.',
        ]);
        
        if ($validator->fails()) {
            return $this->senderror(['errors' => $validator->errors()->all()]);
        }

        if ($request->hasFile('image_id')) {
            $file = $request->file('image_id');


            [$width, $height] = getimagesize($file);

            if ($width != 150 || $height != 150) {
                return $this->senderror('', 'Image must be exactly 150x150 pixels.');
            }


            
            $imageResource = imagecreatefrompng($file->getPathname());

            $hasTransparency = false;
            for ($x = 0; $x < $width; $x++) {
                for ($y = 0; $y < $height; $y++) {
                    $rgba = imagecolorat($imageResource, $x, $y);
                    $alpha = ($rgba & 0x7F000000) >> 24;

                    if ($alpha > 0) {
                        $hasTransparency = true;
                        break 2; // Break both loops if transparency found
                    }
                }
            }

            imagedestroy($imageResource); // Clean up

            if (!$hasTransparency) {
                return $this->senderror('', 'Please remove the background from the image before uploading (transparency required).');
            }



            $filename = time() . '_' . $file->getClientOriginalName();
            $filepath = $file->storeAs('admin_image', $filename, 'public');

            $image = Images::create([
                'image_name' => $filename,
                'image_path' => $filepath,
                'reference_name' => 'amenities',
                'reference_id' => 0, 
            ]);

            $image_id = $image->id;
        }

        $amenities = Amenities::storeamenities($request->name, $image_id ?? null);


        return $this->sendresponse($amenities, 'Amenities added successfully');
    
    }
    public function amenitiesdelete(Request $request)
    {
        $response = Amenities::deleteamenities($request->id);

        if (!$response) {
            return $this->senderror('', 'Amenities not found');
        }

        return $this->sendresponse([], $response['message']);
    }
    
}
