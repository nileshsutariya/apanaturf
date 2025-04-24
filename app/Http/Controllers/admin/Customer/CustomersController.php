<?php

namespace App\Http\Controllers\admin\customer;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CustomersController extends Controller
{
    public function index(Request $request)
    {
        $customer = customer::where('name', 'like', '%' . $request->search . '%')
            ->orWhere('phone', 'like', '%' . $request->search . '%')
            ->orWhere('email', 'like', '%' . $request->search . '%')
            ->orWhere('balance', 'like', '%' . $request->search . '%')->paginate(10);
        if ($request->ajax()) {
            return view('new.admin.customer.customer', compact('customer'))->render();
        } else {
            return view('new.admin.customer.customer', ['customer' => $customer]);
        }
    }
    public function update(Request $request)
    {
        if ($request->id != null) {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'phone' => 'required',
                'balance' => 'required',
                'email' => 'required|email|unique:customer,email,' . $request->id,
            ])->validate();
            $customer = Customer::find($request->id);
        } else {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'phone' => 'required',
                'balance' => 'required',
                'email' => 'required|unique:customer|email',
            ])->validate();
            $customer = new Customer();
        }
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->balance = $request->balance;
        $customer->save();
        return redirect()->route('customer.index');
    }
}
