<?php

namespace App\Http\Controllers\Customer;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginCustomerController extends Controller
{
    public function login()
    {
        return view('customer.login');
    }
    public function loginCheck(Request $request)
    {
        $request->validate([
            'phone' => 'required',
            'password' => 'required|min:6',
        ]);
        
        $customer = Customer::where(function ($query) use ($request) {
                    $query->where('phone', $request->phone);
                })->first();

        if ($customer && Hash::check($request->password, $customer->password)) {

            if ($customer->password_update) {
                Auth::guard('customer')->login($customer);

                return response()->json([
                    'success' => true,
                    'message' => 'Sign in Successfully!',
                    'redirect' => route('customerindex') 
                ]);
            } else {
                $otp = 1234;
                $customer->otp = $otp;
                $customer->otp_send_at = now();
                $customer->save();

                return response()->json([
                    'success' => true,
                    'password_updated' => false 
                ]);
            }
        }

        return response()->json(['success' => false, 'message' => 'Invalid credentials']);
    }

    public function logout(Request $request)
    {
        Auth::guard('customer')->logout();
        return redirect()->route('customer.login')->with('success', 'Logout Successfully.');
    }

    public function ForgotPassword(Request $request)
    {
        $request->validate([
            'customerid' => 'required|string', 
        ]);

        $customer = Customer::where(function ($query) use ($request) {
                    $query->where('phone', $request->customerid);
                })
                ->first();

        if ($customer) {
            $otp = 1234;
            $customer->otp = $otp;
            $customer->otp_send_at = now();
            $customer->save();
            return response()->json([
                'success' => true,
                'customerId' => $customer->id 
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'No matching record found.'
            ]);
        }
    }

    public function ResetPassword(Request $request)
    {
        $request->validate([
            'customerid' => 'required',
            'newpass' => 'required|confirmed|min:6',
        ]);

        $customer = Customer::where(function ($query) use ($request) {
                    $query->where('phone', $request->customerid);
                })
                ->first();


        if (!$customer) {
            return response()->json(['success' => false, 'message' => 'Customer not found.']);
        }

        $customer->password = Hash::make($request->newpass);
        $customer->password_update = now();
        $customer->save();

        return response()->json([
            'success' => true,
            'message' => 'Password reset successfully.',
            'redirect' => route('customer.login')
        ]);
    }
    public function OTPVerify(Request $request)
    {
        $request->validate([
            'phone' => 'required|string',
            'otp' => 'required|string',
        ]);

        $customer = Customer::where('phone', $request->phone)
                            ->where('otp', $request->otp)
                            ->first();

        if (!$customer) {
            return response()->json(['success' => false, 'message' => 'Incorrect OTP']);
        }

        $customer->otp = null;
        $customer->otp_send_at = null;
        $customer->otp_verified_at = now();

        if (!$customer->password_update) {
            $customer->password_update = now();
            $customer->save();

            Auth::guard('customer')->login($customer);

            return response()->json([
                'success' => true,
                'redirect' => route('customerindex') 
            ]);
        }

        $customer->save();

        return response()->json([
            'success' => true,
            'message' => 'OTP verified successfully.'
        ]);
    }

}
