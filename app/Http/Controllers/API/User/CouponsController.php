<?php

namespace App\Http\Controllers\API\User;

use App\Models\Coupons;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\API\BaseController;

class CouponsController extends BaseController
{
    public function store(Request $request) 
    {
        
        $data = $request->only([
            'coupons_name',
            'start_date',
            'end_date',
            'min_order',
            'discount_in_per',
            'discount_in_ruppee',
            'created_by'
        ]);
    
        $coupons = Coupons::storeCoupon($data);     

        return $this->sendresponse($coupons, 'Coupons added successfully.');

    }
    public function delete(Request $request)
    {
        $response = Coupons::couponsdelete($request->id);

        if (!$response) {
            return $this->senderror('', 'Coupon id not found');
        }

        return $this->sendresponse([], $response['message']);
    }
    public function list(Request $request)
    {
        $today = now();
        $startOfMonth = $today->copy()->startOfMonth();
        $endOfMonth = $today->copy()->endOfMonth();
    
        $query = Coupons::where(function($q) use ($endOfMonth) {
                        $q->where('start_date', '<=', $endOfMonth)
                          ->where('end_date', '>=', now());
                    });
    
        $validator = Validator::make($request->all(), [
            'filter_param.id' => 'nullable|exists:coupons_and_offers,id',
            'order.column' => 'nullable|string|in:coupons_name,start_date,end_date,,min_order,id',
            'order.dir' => 'nullable|string|in:asc,desc', 
        ]);
        if($validator->fails()){
            return $this->senderror( ['errors' => $validator->errors()->all()]);
        }

        if ($request->has('filter_param.id') && !empty($request->input('filter_param.id'))) {
            $query->where('id', $request->input('filter_param.id'));
        }

        if (!empty($request->input('search.value'))) {
            $searchValue = $request->input('search.value');
            $query->where(function($q) use ($searchValue) {
                $q->where('coupons_name', 'LIKE', "%{$searchValue}%")
                ->orWhere('start_date', 'LIKE', "%{$searchValue}%")
                ->orWhere('end_date', 'LIKE', "%{$searchValue}%");
            });
        }

        $sortColumn = $request->input('order.column', 'id'); 
        $sortDirection = $request->input('order.dir', 'asc'); 
    
        $query->orderBy($sortColumn, $sortDirection);
    
        $coupons = $query->offset($request->start*$request->length)->limit($request->length)->get();

        return $this->sendresponse($coupons, 'Coupons List');
    }

}
