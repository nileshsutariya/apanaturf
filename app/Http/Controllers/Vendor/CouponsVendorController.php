<?php

namespace App\Http\Controllers\Vendor;

use Carbon\Carbon;
use App\Models\City;
use App\Models\Turf;
use App\Models\Coupons;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CouponsVendorController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $vendor = auth('vendor')->user(); 

        $coupons = Coupons::leftJoin('turf', 'coupons_and_offers.turf_id', '=', 'turf.id')
            ->leftJoin('venues', 'coupons_and_offers.created_by', '=', 'venues.id') 
            ->leftJoin('city', 'coupons_and_offers.city_id', '=', 'city.id')

            ->where('coupons_and_offers.created_by_type', 'vendor')
            ->where('coupons_and_offers.created_by', $vendor->id)

            ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('coupons_and_offers.start_date', 'like', '%' . $search . '%')
                    ->orWhere('coupons_and_offers.end_date', 'like', '%' . $search . '%')
                    ->orWhere('coupons_and_offers.coupons_name', 'like', '%' . $search . '%')
                    ->orWhere('city.city_name', 'like', '%' . $search . '%');
                });
            })

            ->select(
                'coupons_and_offers.*',
                'turf.name as turf_name',
                'turf.id as turf_id',
                'venues.owner_name as vendor_name', 
                'city.id as city_id',
                'city.city_name as city_name'
            )
            ->get();

        $turf = Turf::where('created_by', $vendor->id)
                    ->where('status', 1)
                    ->get();

        $city = City::all();

        if ($request->ajax()) {
            return view('vendor.coupons.coupons', compact('coupons', 'turf', 'city'))->render();
        } else {
            return view('vendor.coupons.coupons', compact('coupons', 'turf', 'city'));
        }
    }

    public function store(Request $request)
    {
        // print_r($request->all());die;
        $validator = Validator::make($request->all(), [
            'coupons_name' => 'required|string|max:255',
            'valid_date' => 'required|date',
            'expire_date' => 'required|date|after_or_equal:valid_date',
            'discount' => 'required|numeric|min:0|',
            'discount_type' => 'required',
            'min_order' => 'required|numeric|min:0',
        ]);
        $validator->sometimes('discount', 'max:100', function ($input) {
            return $input->discount_type === 'Percentage';
        });
        $validator->validate();
                
        $start_date = Carbon::parse($request->valid_date)->format('Y-m-d');
        $end_date = Carbon::parse($request->expire_date)->format('Y-m-d');

        $coupon = $request->id ? Coupons::find($request->id) : new Coupons();
        $coupon->coupons_name = $request->coupons_name;
        if (!$request->id) {
            $yearSuffix = date('d', strtotime($end_date)); 
            $coupon->coupons_code = 'END' . $yearSuffix;
        } else {
            $coupon->coupons_code = $request->code;
        }
        $coupon->turf_id = $request->turf;
        $coupon->city_id = $request->city;
        $coupon->start_date = $start_date;
        $coupon->end_date = $end_date;
        $coupon->discount = $request->discount;
        $coupon->user_limit = $request->user_limit;
        $coupon->discount_type = $request->discount_type;
        $coupon->created_by = auth('vendor')->id();
        $coupon->created_by_type = 'vendor';
        $coupon->min_order = $request->min_order;
        $coupon->save();

        return redirect()->route('offers.index')->with('success', 'Coupon saved successfully');
    }
}
