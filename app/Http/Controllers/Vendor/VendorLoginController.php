<?php

namespace App\Http\Controllers\Vendor;

use Carbon\Carbon;
use App\Models\Venues;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class VendorLoginController extends Controller
{
    public function dashboard()
    {
        return view('vendor.dashboard');
    }
    public function login()
    {
        if (Auth::guard('vendor')->check()) {
            return redirect()->route('vendor.dashboard'); 
        }
        return view('vendor.login');
    }

    public function loginCheck(Request $request)
    {
        if (Auth::guard('vendor')->check()) {
            return redirect()->route('vendor.dashboard');
        }
        $request->validate([
            'phone' => 'required',
            'password' => 'required|min:8',
        ]);
        
        $vendor = Venues::where(function ($query) use ($request) {
                    $query->where('owner_phone', $request->phone)
                        ->orWhere('vendor_id', $request->phone);
                })
                ->where('status', 1)
                ->first();

        if ($vendor && Hash::check($request->password, $vendor->password)) {

            if ($vendor->password_update) {
                Auth::guard('vendor')->login($vendor);

                return response()->json([
                    'success' => true,
                    'message' => 'Sign in Successfully!',
                    'redirect' => route('vendor.dashboard') 
                ]);
            } else {
                $otp = 1234;
                $vendor->otp = $otp;
                $vendor->otp_send_at = now();
                $vendor->save();

                return response()->json([
                    'success' => true,
                    'password_updated' => false 
                ]);
            }
        }

        return response()->json(['success' => false, 'message' => 'Invalid credentials']);
    }

    public function VerifyOtp(Request $request)
    {
        // $vendor = Venues::where('phone', $request->phone)->where('otp', $request->otp)->first();
        $vendor = Venues::where(function ($query) use ($request) {
        $query->where('owner_phone', $request->phone)
              ->orWhere('vendor_id', $request->phone);
            })->where('otp', $request->otp)->first();     

        if ($vendor) {
            $vendor->otp = null;
            $vendor->otp_send_at = null;
            $vendor->otp_verified_at = now();
            $vendor->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'Incorrect OTP']);
    }

    public function SetPassword(Request $request)
    {
        $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required|min:8',
        ]);

        $vendor = Venues::where(function ($query) use ($request) {
                    $query->where('owner_phone', $request->phone)
                        ->orWhere('vendor_id', $request->phone);
                })
                ->where('status', 1)
                ->first();

        if (!$vendor) {
            return response()->json([
                'success' => false,
                'message' => 'Vendor not found.'
            ]);
        }

        if (!Hash::check($request->oldpassword, $vendor->password)) {
            return response()->json([
                'success' => false,
                'message' => 'Old password is incorrect.'
            ]);
        }

        $vendor->password = Hash::make($request->newpassword);
        $vendor->password_update = now();
        $vendor->save();

        return response()->json(['success' => true, 'message' => 'Password updated successfully.']);
    }
    public function logout(Request $request)
    {
        Auth::guard('vendor')->logout();
        return redirect()->route('vendor.login')->with('success', 'Logout Successfully.');
    }

    public function ForgotPassword(Request $request)
    {
        $request->validate([
            'vendorid' => 'required|string', 
        ]);

        // $vendor = Venues::where('phone', $request->vendorid)
        //             // ->orWhere('email', $request->vendorid)
        //             ->orWhere('vendor_id', $request->vendorid)
        //             ->first();
        $vendor = Venues::where(function ($query) use ($request) {
                    $query->where('owner_phone', $request->vendorid)
                        ->orWhere('vendor_id', $request->vendorid);
                })
                ->where('status', 1)
                ->first();

        if ($vendor) {
            $otp = 1234;
            $vendor->otp = $otp;
            $vendor->otp_send_at = now();
            $vendor->save();
            return response()->json([
                'success' => true,
                'vendorId' => $vendor->id 
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
            'vendorid' => 'required',
            'newpass' => 'required|confirmed|min:6',
        ]);

        // $vendor = Venues::where(column: 'phone', $request->vendorid)->first();
        $vendor = Venues::where(function ($query) use ($request) {
                $query->where('owner_phone', $request->vendorid)
                    ->orWhere('vendor_id', $request->vendorid);
            })
            ->where('status', 1)
            ->first();  

        if (!$vendor) {
            return response()->json(['success' => false, 'message' => 'Vendor not found.']);
        }

        $vendor->password = Hash::make($request->newpass);
        $vendor->password_update = now();
        $vendor->save();

        return response()->json([
            'success' => true,
            'message' => 'Password reset successfully.',
            'redirect' => route('vendor.login')
        ]);
    }

}   