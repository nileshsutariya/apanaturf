<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\API\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Coupons;
use Illuminate\Http\Request;

class CouponsController extends BaseController
{
    public function addcoupons(Request $request) 
    {
        $coupons = Coupons::create([
            'coupons_name' => $request->coupons_name,
            'coupons_code' => $request->coupons_code,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'min_order' => $request->min_order,
            'discount_in_per' => $request->discount_in_per,
            'discount_in_ruppee' => $request->discount_in_ruppee,
            'created_by' => $request->created_by,
        ]);
        return $this->sendresponse($coupons, 'Coupons added successfully.');

    }
}
