<?php

namespace App\Http\Controllers\admin;

use App\Models\City;
use App\Models\Turf;
use App\Models\Coupons;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CouponsController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $user = Auth::user();

        $coupons = Coupons::leftJoin('turf', 'coupons_and_offers.turf_id', '=', 'turf.id')
            ->leftJoin('users', 'coupons_and_offers.created_by', '=', 'users.id')
            ->leftJoin('role_type', 'users.role_id', '=', 'role_type.id')
            ->leftJoin('city', 'coupons_and_offers.city_id', '=', 'city.id')
            ->when($user->role_id != 1, function ($query) use ($user) {
                $query->where('coupons_and_offers.created_by', $user->id);
            })->where(function ($query) use ($search) {
                $query->where('coupons_and_offers.start_date', 'like', '%' . $search . '%')
                    ->orWhere('coupons_and_offers.end_date', 'like', '%' . $search . '%')
                    ->orWhere('role_type.name', 'like', $search . '%');
            })
            ->select('coupons_and_offers.*', 'turf.name as turf_name', 'turf.id as turf_id', 'users.name as users_name', 'role_type.name as role_name', 'city.id as city_id','city.city_name as city_name')
            ->paginate(10);
        $turf = Turf::all();
        $city = City::all();
        if ($request->ajax()) {
            return view('admin.coupons.coupons', compact('coupons', 'turf', 'city'))->render();
        } else {
            return view('admin.coupons.coupons', compact('coupons', 'turf', 'city'));
        }
    }
    public function store(Request $request)
    {
        // print_r($request->all());die;
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'turf' => 'required',
            'discount_type' => 'required',
            'valid_date' => 'required|date',
            'expire_date' => 'required|date|after_or_equal:valid_date',
            'discount' => 'required|numeric|min:0|',
            'min_order' => 'required|numeric|min:0',
        ]);
        $validator->sometimes('discount', 'max:100', function ($input) {
            return $input->discount_type === 'Percentage';
        });
        $validator->validate();
        $start_date = date('Y-m-d', strtotime(str_replace('-', '/', $request->valid_date)));
        $end_date = date('Y-m-d', strtotime(str_replace('-', '/', $request->expire_date)));

        $coupon = $request->id ? Coupons::find($request->id) : new Coupons();
        $coupon->coupons_name = $request->name;
        $request->id ? $coupon->coupons_code = $request->code : '';
        // $coupon->coupons_code = $request->code;
        $coupon->turf_id = $request->turf;
        $coupon->city_id = $request->city;
        $coupon->start_date = $start_date;
        $coupon->end_date = $end_date;
        $coupon->discount = $request->discount;
        $coupon->user_limit = $request->user_limit;
        $coupon->type = $request->discount_type;
        $coupon->created_by = 1;
        $coupon->min_order = $request->min_order;
        $coupon->save();

        return redirect()->route('coupons.index');
    }


}
