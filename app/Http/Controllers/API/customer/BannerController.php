<?php

namespace App\Http\Controllers\API\customer;

use App\Http\Controllers\API\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends BaseController
{
    public function banners(Request $request)
    {
        // $customer = auth('customer')->user();
        // print_r($customer);die;

        // if (!$customer || !$customer->otp_verified_at) {
        //     return response()->json(['message' => 'OTP verification required.'], 403);
        // }

        
        $eventId = $request->input('event_id'); 

        $banner = Banner::join('images', 'banner.image_id', '=', 'images.id')
                    ->select('banner.id', 'banner.event_id', 'images.image_name')
                    ->orderBy('banner.created_at', 'desc')
                    ->take(3)->get();

        foreach ($banner as $item) {
            Banner::where('id', $item->id)->update(['event_id' => $eventId]);
        }
        
        return $this->sendresponse($banner, 'banner list');
    }
}
