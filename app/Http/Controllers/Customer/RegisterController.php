<?php

namespace App\Http\Controllers\Customer;

use Carbon\Carbon;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function index()
    {
        return view('customer.index.index');
    }
    public function register()
    {
        return view('customer.registration');
    }

    public function registercheck(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'email|unique:customer,email',
            'phone' => 'required|digits:10|unique:customer,phone',
            'password' => 'required|min:6',
        ])->validate();

        $customer = new Customer();
        $customer->unique_id = uniqid();
        $customer->name = $request['name'];
        $customer->email = $request['email'] ?? NULL;
        $customer->phone = $request['phone'];
        $customer->password = Hash::make($request['password']);
        $customer->balance = $request['balance'] ?? 100;
        $customer->save();

        return redirect()->route('customer.login');
    }

}
