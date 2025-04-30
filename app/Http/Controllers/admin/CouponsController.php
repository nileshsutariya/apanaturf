<?php

namespace App\Http\Controllers\admin;

use App\Models\Turf;
use App\Models\Coupons;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CouponsController extends Controller
{
    public function index(Request $request)
    {
        $coupons = Coupons::leftJoin('turf', 'coupons_and_offers.turf_id', '=', 'turf.id')
            ->leftJoin('users', 'coupons_and_offers.created_by', '=', 'users.id')
            ->leftJoin('role_type', 'users.role_id', '=', 'role_type.id')
            ->where('coupons_and_offers.start_date', 'like', '%' . $request->search . '%')
            ->orWhere('coupons_and_offers.end_date', 'like', '%' . $request->search . '%')
            ->orWhere('role_type.name', 'like', $request->search . '%')
            ->select('coupons_and_offers.*','turf.name as turf_name','turf.id as turf_id','users.name as users_name','role_type.name as role_name')
            ->paginate(10);
        $turf = Turf::all();
        if ($request->ajax()) {
            return view('admin.coupons.coupons', compact('coupons', 'turf'))->render();
        } else {
            return view('admin.coupons.coupons', compact('coupons', 'turf'));
        }
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'turf' => 'required',
            'valid_date' => 'required|date',
            'expire_date' => 'required|date|after_or_equal:valid_date',
            'dis_per' => 'required|numeric|min:0|max:100',
            'dis_rupees' => 'required|numeric|min:0',
            'min_order' => 'required|numeric|min:0',
            ])->validate();
            $coupon = new Coupons();
            $coupon->coupons_name = $request->name;
            $coupon->coupons_code = $request->code;
            $coupon->turf_id = $request->turf;
            $coupon->start_date = $request->valid_date;
            $coupon->end_date = $request->expire_date;
            $coupon->discount_in_per = $request->dis_per;
            $coupon->discount_in_ruppee = $request->dis_rupees;
            $coupon->created_by = 1;
            $coupon->min_order = $request->min_order;
            $coupon->save();

            return redirect()->route('coupons.index');
    }


}
