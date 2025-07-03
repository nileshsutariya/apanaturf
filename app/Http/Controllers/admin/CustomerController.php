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
        $customerQuery = customer::leftJoin('city', 'customer.city_id', '=', 'city.id')
                        ->leftJoin('area', 'customer.area_id', '=', 'area.id')
                        ->select(
                            'customer.*',
                            'city.city_name',
                            'city.id as city_id',
                            'area.area as area_name',
                            'area.id as area_id'
                        )
                        ->where(function ($q) use ($request) {
                            $q->where('customer.name', 'like', '%' . $request->search . '%')
                            ->orWhere('customer.phone', 'like', '%' . $request->search . '%')
                            ->orWhere('customer.email', 'like', '%' . $request->search . '%')
                            ->orWhere('customer.balance', 'like', '%' . $request->search . '%');
                        });
    
        $user = auth()->user();
        
        $user->role_id == 2 ? $customerQuery->where('customer.city_id', $user->city_id) : ($user->role_id == 3 ? $customerQuery->where('customer.area_id', $user->area_id) : null);

        $customer = $customerQuery->paginate(10);
        $city = City::all();
    
        $areas = $request->city_id ? Area::where('city_id', $request->city_id)->get() : Area::all();
    
        return $request->ajax() ? view('admin.customer.customer', compact('customer', 'city', 'areas'))->render() : view('admin.customer.customer', compact('customer', 'city', 'areas'));

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
