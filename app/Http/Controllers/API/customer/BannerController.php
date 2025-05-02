<?php

namespace App\Http\Controllers\API\customer;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\API\BaseController;

class BannerController extends BaseController
{
    public function banners(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'filter_param.id' => 'nullable|exists:banner,id',
            'order.column' => 'nullable|string|in:id,event_id',
            'order.dir' => 'nullable|string|in:asc,desc', 
            'limit' => 'nullable|integer|min:1', 
        ])->validate();
        $query = Banner::join('images', 'banner.image_id', '=', 'images.id')
                    ->select('banner.id', 'images.image_name', 'images.image_path');

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

        $start = $request->input('start', 0);
        $length = $request->input('length', 10);
        $banner = $query->offset($start)->limit($length)->get();

        // $limit = $request->input('limit', 10);
        // $banner = $query->take($limit)->get();

        foreach ($banner as $item) {
            $item->image_url = asset('storage/' . $item->image_path);
            unset($item->image_path);
        }

        return $this->sendresponse($banner, 'banner list');
    }
}
