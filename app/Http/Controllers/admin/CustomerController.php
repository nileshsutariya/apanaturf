<?php

namespace App\Http\Controllers\admin;

use App\Models\Area;
use App\Models\City;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $customer = customer::leftJoin('city', 'customer.city_id', '=', 'city.id')
            ->leftJoin('area_code', 'customer.area_id', '=', 'area_code.id')
            ->select('customer.*', 'city.city_name', 'city.id as city_id', 'area_code.area as area_name', 'area_code.id as area_id')
            ->where('name', 'like', '%' . $request->search . '%')
            ->orWhere('phone', 'like', '%' . $request->search . '%')
            ->orWhere('email', 'like', '%' . $request->search . '%')
            ->orWhere('balance', 'like', '%' . $request->search . '%')
            ->paginate(10);
    
        $city = City::all();
    
        if ($request->city_id) {
            $areas = Area::where('city_id', $request->city_id)->get();
        } else {
            $areas = Area::all();
        }
    
        if ($request->ajax() && $request->city_id) {
            return response()->json($areas); // only for dynamic area fetch
        }
    
        if ($request->ajax()) {
            return view('admin.customer.customer', compact('customer', 'city', 'areas'))->render();
        } else {
            return view('admin.customer.customer', compact('customer', 'city', 'areas'));
        }
    }
    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
            'balance' => 'required',
            'email' => 'required|email|unique:customer,email' . ($request->id ? ',' . $request->id : ''),
        ])->validate();
        $customer = $request->id ? Customer::find($request->id) : new Customer();
        $customer->name = $request->name;
        $customer->unique_id = uniqid();
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->balance = $request->balance;
        $customer->city_id = $request->city;
        $customer->area_id = $request->area;

        $customer->save();
        return redirect()->route('customer.index');
    }
}
