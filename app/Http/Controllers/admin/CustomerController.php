<?php

namespace App\Http\Controllers\admin;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $customer = customer::where('name', 'like', '%' . $request->search . '%')
            ->orWhere('phone', 'like', '%' . $request->search . '%')
            ->orWhere('email', 'like', '%' . $request->search . '%')
            ->orWhere('balance', 'like', '%' . $request->search . '%')->paginate(10);
        if ($request->ajax()) {
            return view('admin.customer.customer', compact('customer'))->render();
        } else {
            return view('admin.customer.customer', ['customer' => $customer]);
        }
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
            'balance' => 'required',
            'email' => 'required|email|unique:users,email' . ($request->id ? ',' . $request->id : ''),
        ])->validate();
        $customer = Customer::find($request->id);
        $customer = $request->id ? Customer::find($request->id) : new Customer();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->balance = $request->balance;
        $customer->save();
        return redirect()->route('customer.index');
    }
}
