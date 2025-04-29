<?php

namespace App\Http\Controllers\API\customer;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\API\BaseController;

class BannerController extends BaseController
{
    // public function storebanners(Request $request)
    // {
    //     $bannerId = $request->input('id'); 
    //     $eventId = $request->input('event_id');

    //     $banner = Banner::find($bannerId);
    //     if (!$banner) {
    //         return $this->senderror('Banner not found', [], 404);
    //     }

    //     $banner->event_id = $eventId;
    //     $banner->save();

    //     return $this->sendresponse($banner, 'Banner saved successfully');
    // }


    public function banners(Request $request)
    {
        // $customer = auth('customer')->user();
        // print_r($customer);die;

        // if (!$customer || !$customer->otp_verified_at) {
        //     return response()->json(['message' => 'OTP verification required.'], 403);
        // }

        
        // $eventId = $request->input('event_id'); 
        // $imageId = $request->input('image_id'); 



        $validator = Validator::make($request->all(), [
            'filter_param.id' => 'nullable|exists:banner,id',
            'order.column' => 'nullable|string|in:id,event_id',
            'order.dir' => 'nullable|string|in:asc,desc', 
            'limit' => 'nullable|integer|min:1', 
        ]);
    
        if ($validator->fails()) {
            return $this->senderror(['errors' => $validator->errors()->all()]);
        }
        $query = Banner::join('images', 'banner.image_id', '=', 'images.id')
                    ->select('banner.id', 'images.image_name', 'images.image_path');
                    // ->get();

        if ($request->has('filter_param.id') && !empty($request->input('filter_param.id'))) {
            $query->where('banner.id', $request->input('filter_param.id'));
        }

        if (!empty($request->input('search.value'))) {
            $searchValue = $request->input('search.value');
            $query->where(function($q) use ($searchValue) {
                $q->where('images.image_name', 'LIKE', "%{$searchValue}%")
                  ->orWhere('banner.event_id', 'LIKE', "%{$searchValue}%");
            });
        }

        $sortColumn = $request->input('order.column', 'banner.id'); 
        $sortDirection = $request->input('order.dir', 'asc');

        $query->orderBy($sortColumn, $sortDirection);

        $limit = $request->input('limit', 10);
        $banner = $query->take($limit)->get();

        foreach ($banner as $item) {
            $item->image_url = asset('storage/' . $item->image_path);
            unset($item->image_path);
        }

        // foreach ($banner as $item) {
        //     Banner::where('id', $item->id)->update(['event_id' => $eventId]);
        // }
        
        return $this->sendresponse($banner, 'banner list');
    }
}
