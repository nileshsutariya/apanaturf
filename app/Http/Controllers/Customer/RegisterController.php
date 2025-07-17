<?php

namespace App\Http\Controllers\Customer;

use Carbon\Carbon;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        $customer->otp = 1234;
        $customer->otp_send_at = Carbon::now();
        $customer->save();

        return response()->json(['status' => 'success']);
    }

    public function VerifyOtp(Request $request)
    {
        $customer = Customer::where(function ($query) use ($request) {
        $query->where('phone', $request->phone);
            })->where('otp', $request->otp)->first();     

        if ($customer) {
            $customer->otp = null;
            $customer->otp_send_at = null;
            $customer->otp_verified_at = now();
            $customer->save();

            return response()->json([
                'success' => true,
                // 'redirect' => route('customer.login'),
                // 'message' => 'OTP verified successfully.'
            ]);
        }

        return response()->json(['success' => false, 'message' => 'Incorrect OTP']);
    }

}
