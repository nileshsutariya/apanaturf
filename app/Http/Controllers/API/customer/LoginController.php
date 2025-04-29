<?php

namespace App\Http\Controllers\API\customer;

use Carbon\Carbon;
use App\Models\Customer;
use App\Models\CustomerInfo;
use Illuminate\Http\Request;
use App\Models\LocationHistory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Stevebauman\Location\Facades\Location;
use App\Http\Controllers\API\BaseController;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class LoginController extends BaseController
{

    public function login(Request $request)
    {
        $data = $request->all();
    
        $loginInput = $data['login_as'] ?? null;
        $password = $data['password'] ?? null;
        $latitude = $data['latitude'] ?? null;
        $longitude = $data['longitude'] ?? null;
        $fcm_token = $data['fcm_token'] ?? null;
    
        if (!$loginInput || !$password) {
            return $this->senderror('Invalid request.', ['error' => 'Login credentials are required.']);
        }

        // $existingUser = Auth::guard('customer')->user();
        // if ($existingUser) {
        //     return $this->senderror('Already logged in.', ['error' => 'User is already logged in.']);
        // }

        $credentials = [
            'phone' => $loginInput, 
            'password' => $password, 
        ];

        if (!$token = Auth::guard('customer')->attempt($credentials)) {
            return $this->senderror('Unauthorised.', ['error' => 'Unauthorized']);
        }
    
        $customer = Auth::guard('customer')->user();

       
        $location = LocationHistory::create([
            'latitude' => $latitude,
            'longitude' => $longitude,
            'customer_id' => $customer->id,
        ]);

        CustomerInfo::create([
            'latitude' => $latitude,
            'longitude' => $longitude,
            'customer_id' => $customer->id,
            'fcm_token' => $fcm_token, 
        ]);
        
        $otp = 1234;
        $customer->otp = $otp;
        $customer->otp_send_at = now();
        $customer->otp_verified_at = null;
        $customer->location_history = $location->id;
        $customer->save();
    
        $success = $this->respondWithToken($token); 
        return $this->sendresponse($success, 'User logged in successfully.');
    }
    
    public function logout(Request $request)
    {
        JWTAuth::invalidate(JWTAuth::getToken());
    
        return $this->sendresponse([], 'Successfully logged out.');
    }
    

    // public function logout(Request $request)
    // {
    //     $token = $request->bearerToken();

    //     if (!$token) {
    //         return $this->senderror('Unauthorized', ['error' => 'Token not found.']);
    //     }

    //     $user = $request->user();

    //     if ($user && $user->token()) {
    //         $user->token()->revoke(); // Revoke current token
    //         return $this->sendresponse([], 'Successfully logged out.');
    //     }

    //     return $this->senderror('Unauthorized', ['error' => 'User not authenticated.']);
    // }

    
    protected function respondWithToken($token)
    {
        return [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ];
    }

    public function verifyotp(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'id' => 'required|exists:customer,id',
            'otp'     => 'required',
        ]);

        if ($validator->fails()) {
            return $this->senderror(['errors' => $validator->errors()->all()]);
        }

        $customer = Customer::find($data['id']);

        if (!$customer) {
            return $this->senderror('User not found.');
        }

        if (!$customer->otp_send_at) {
            return $this->senderror('OTP not found. Please request again.');
        }

        if (now()->diffInSeconds(Carbon::parse($customer->otp_send_at)) > 300) {
            return $this->senderror('OTP expired. Please request a new one.');
        }

        if ((string) $customer->otp !== (string) $data['otp']) {
            return $this->senderror('Invalid OTP. Please try again.');
        }

        $customer->otp_verified_at = now();
        $customer->otp = null;
        $customer->save();

        return $this->sendresponse([
            'verified' => true,
            'id' => $customer->id
        ], 'OTP verified successfully.');
    }

    public function resendotp(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'id' => 'required|exists:customer,id',
        ]);

        if ($validator->fails()) {
            return $this->senderror(['errors' => $validator->errors()->all()]);
        }

        $customer = Customer::find($data['id']);

        if (!$customer) {
            return $this->senderror('Customer not found.');
        }

        $customer->otp = 1234;
        $customer->otp_send_at = now();
        $customer->save();

    
        return $this->sendresponse([
            'id' => $customer->id
        ], 'OTP resent successfully.');
    }



}
