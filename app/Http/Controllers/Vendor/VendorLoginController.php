<?php

namespace App\Http\Controllers\Vendor;

use Carbon\Carbon;
use App\Models\Venues;
use Illuminate\Http\Request;
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
        return view('vendor.login');
    }

    public function loginCheck(Request $request)
    {
        $user = Venues::where('phone', $request->phone)->first();

        if ($user && Hash::check($request->password, $user->password)) {

            if ($user->password_update) {
                Auth::guard('vendor')->login($user);

                return response()->json([
                    'success' => true,
                    'redirect' => route('vendor.dashboard') 
                ]);
            } else {
                $otp = 1234;
                $user->otp = $otp;
                $user->otp_send_at = now();
                $user->save();

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
        $user = Venues::where('phone', $request->phone)->where('otp', $request->otp)->first();

        if ($user) {
            $user->otp = null;
            $user->otp_send_at = null;
            $user->save();

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

        $vendor = Venues::where('phone', $request->phone)->first();

        if (!$vendor) {
            return back()->withErrors(['phone' => 'Vendor not found.']);
        }

        if (!Hash::check($request->oldpassword, $vendor->password)) {
            return back()->withErrors(['oldpassword' => 'Old password is incorrect.']);
        }

        $vendor->password = Hash::make($request->newpassword);
        $vendor->password_update = now();
        $vendor->save();

        return redirect()->route('vendor.login')->with('success', 'Password updated successfully.');
    }
    public function logout(Request $request)
    {
        Auth::guard('vendor')->logout();
        return redirect()->route('vendor.login');        
    }

    public function ForgotPassword(Request $request)
    {
        $request->validate([
            'vendorid' => 'required|string', 
        ]);

        $vendor = Venues::where('phone', $request->vendorid)
                    // ->orWhere('email', $request->vendorid)
                    ->orWhere('vendor_id', $request->vendorid)
                    ->first();

        if ($vendor) {
            $otp = 1234;
            $vendor->otp = $otp;
            $vendor->save();
            return response()->json([
                'success' => true,
                'vendorId' => $vendor->id 
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'No matching account found.'
            ]);
        }
    }

    public function ResetPassword(Request $request)
    {
        $request->validate([
            'phone' => 'required|string',
            'newpass' => 'required|min:8|confirmed', 
        ]);

        $vendor = Venues::where('phone', $request->phone)
                        ->orWhere('vendor_id', $request->phone) 
                        ->first();
                        
        if (!$vendor) {
            return response()->json([
                'success' => false,
                'message' => 'Vendor not found.',
            ]);
        }

        $vendor->password = Hash::make($request->newpass);

        $vendor->save();

        return response()->json([
            'success' => true,
            'message' => 'Password updated successfully.',
            'redirect' => route('vendor.login') 
        ]);
    }


}   