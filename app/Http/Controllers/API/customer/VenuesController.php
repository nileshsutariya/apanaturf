<?php

namespace App\Http\Controllers\API\customer;

use App\Models\Venues;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\API\BaseController;

class VenuesController extends BaseController
{
    public function venues(Request $request)
    {
    //     $customer = auth('customer')->user();
    //     // print_r($user);die;

    //     if (!$customer || !$customer->otp_verified_at) {
    //         return response()->json(['message' => 'OTP verification required.'], 403);
    //     }

    //     $venues = Venues::query()
    //             ->leftJoin('coupons_and_offers', 'venues.turf_id', '=', 'coupons_and_offers.turf_id')
    //             ->leftJoin('turf', 'venues.turf_id', '=', 'turf.id') 
    //             ->select(
    //                 'venues.*',
    //                 'coupons_and_offers.id as coupon_id',
    //                 'coupons_and_offers.coupons_name as coupon_title',
    //                 'coupons_and_offers.coupons_code as coupon_code',
    //                 'coupons_and_offers.start_date',
    //                 'coupons_and_offers.end_date',
    //                 'coupons_and_offers.min_order',
    //                 'coupons_and_offers.discount_in_per',
    //                 'coupons_and_offers.discount_in_ruppee',
    //                 'coupons_and_offers.created_by',
    //                 'turf.name as turf_name', 
    //                 'turf.location_text as turf_location' 
    //             );

    // //     $venues = Venues::query()
    // // ->leftJoin('coupons_and_offers', 'venues.turf_id', '=', 'coupons_and_offers.turf_id')
    // // ->leftJoin('turf', 'venues.turf_id', '=', 'turf.id')
    // // ->select(
    // //     'venues.id',
    // //     // 'venues.name',
    // //     'venues.location_link',
    // //     'venues.created_at',
    // //     'venues.updated_at',
    // //     'coupons_and_offers.id as coupon_id',
    // //     'coupons_and_offers.coupons_name as coupon_title',
    // //     'coupons_and_offers.discount_in_per',
    // //     'coupons_and_offers.end_date',
    // //     'turf.name as turf_name',
    // //     'turf.location_text as turf_location'
    // // );


    //     $validator = Validator::make($request->all(), [ 
    //         'filter_param.id' => 'nullable|exists:venues,id',
    //         'filter_param.area' => 'nullable|exists:venues,area',
    //         'order.column' => 'nullable|string|in:id',
    //         'order.dir' => 'nullable|string|in:asc,desc',
    //         'date' => 'nullable|date|after_or_equal:today',
    //         'time' => 'nullable|date_format:H:i'
    //         // 'time' => 'nullable|date_format:H:i|after_or_equal:' . now()->format('H:i'),
    //     ]);
    
    //     if ($validator->fails()) {
    //         return $this->senderror(['errors' => $validator->errors()->all()]);
    //     }
    
    //     if ($request->has('filter_param.id') && !empty($request->input('filter_param.id'))) {
    //         $venues->where('venues.id', $request->input('filter_param.id'));
    //     }
    
    //     if ($request->has('filter_param.area') && !empty($request->input('filter_param.area'))) {
    //         $venues->where('venues.area', $request->input('filter_param.area'));
    //     }
    
    //     if (!empty($request->input('search.value'))) {
    //         $searchValue = $request->input('search.value');
    //         $venues->where(function($q) use ($searchValue) {
    //             $q->where('area', 'LIKE', "%{$searchValue}%")
    //               ->orWhere('pincode', 'LIKE', "%{$searchValue}%")
    //               ->orWhere('phone', 'LIKE', "%{$searchValue}%");
    //         });
    //     }   
    
    //     if ($request->filled('date') && $request->filled('time')) {
    //         $date = $request->input('date');
    //         $time = $request->input('time');
     
    //         $venues->whereNotIn('venues.id', function ($query) use ($date, $time) {
    //             $query->select('venues_id')
    //                 ->from('booking')
    //                 ->whereDate('booking_on', $date)
    //                 ->where(function ($q) use ($time) {
    //                     $q->where(function ($inner) use ($time) {
    //                         $inner->whereRaw("TIME(time_in) <= ?", [$time])
    //                               ->whereRaw("TIME(time_out) > TIME(time_in)")
    //                               ->whereRaw("TIME(time_out) > ?", [$time]);
    //                     })->orWhere(function ($inner) use ($time) {
    //                         $inner->whereRaw("TIME(time_in) <= ?", [$time])
    //                               ->whereRaw("TIME(time_out) < TIME(time_in)")
    //                               ->whereRaw("(? < '24:00:00' OR ? < '04:00:00')", [$time, $time]);
    //                     });
    //                 })
    //                 ->whereIn('status', ['1', '2']); 
    //         });
            
    //         $venues->whereExists(function ($query) use ($time) {
    //             $query->select(DB::raw(1))
    //                   ->from('turf_timing')
    //                   ->whereRaw('turf_timing.turf_id = venues.turf_id')
    //                   ->whereRaw("'$time' BETWEEN turf_timing.from AND turf_timing.to");
    //         });
    //     }
    
    //     $sortColumn = $request->input('order.column', 'venues.id'); 
    //     $sortDirection = $request->input('order.dir', 'asc');
    
    //     $venues->orderBy($sortColumn, $sortDirection);
    
    //     $start = $request->input('start', 0);
    //     $length = $request->input('length', 10);
    
    //     $data = $venues->offset($start)->limit($length)->get();

    //     return $this->sendresponse($data, 'venues list');
    } 
}
