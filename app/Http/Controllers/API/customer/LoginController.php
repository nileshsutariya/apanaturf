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
        $loginInput = $request['login_as'] ?? null;
        $password = $request['password'] ?? null;
        $latitude = $request['latitude'] ?? null;
        $longitude = $request['longitude'] ?? null;
        $fcm_token = $request['fcm_token'] ?? null;
    
        if (!$loginInput || !$password) {
            return $this->senderror('Invalid request.', ['error' => 'Login credentials are required.']);
        }

        $credentials = [
            'phone' => $loginInput, 
            'password' => $password
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
        
        $customer->update([
            'otp' => 1234,
            'otp_send_at' => now(),
            'otp_verified_at' => null,
            'location_history' => $location->id
        ]);
    
        $success = $this->respondWithToken($token); 
        return $this->sendresponse($success, 'User logged in successfully.');
    }
    
    public function logout(Request $request)
    {
        JWTAuth::invalidate(JWTAuth::getToken());
        return $this->sendresponse([], 'Successfully logged out.');
    }

    protected function respondWithToken($token)
    {
        return [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => JWTAuth::factory()->getTTL() * 60
        ];
    }

    public function VerifyOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:customer,id',
            'otp' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->senderror(['errors' => $validator->errors()->all()]);
        }

        $customer = Customer::find($request['id']);

        if (!$customer) {
            return $this->senderror([],'User not found.');
        }

        if (!$customer->otp_send_at) {
            return $this->senderror([],'OTP not found. Please request again.');
        }

        if (now()->diffInSeconds(Carbon::parse($customer->otp_send_at)) > 300) {
            return $this->senderror([],'OTP expired. Please request a new one.');
        }

        if ((string) $customer->otp !== (string) $request['otp']) {
            return $this->senderror([],'Invalid OTP. Please try again.');
        }

        $customer->update(['otp_verified_at' => now(), 'otp' => null]);

        return $this->sendresponse(['verified' => true,'id' => $customer->id], 'OTP verified successfully.');
    }

    public function ResendOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:customer,id',
        ]);

        if ($validator->fails()) {
            return $this->senderror(['errors' => $validator->errors()->all()]);
        }

        $customer = Customer::find($request['id']);

        if (!$customer) {
            return $this->senderror('Customer not found.');
        }

        $customer->otp = 1234;
        $customer->otp_send_at = now();
        $customer->save();

        return $this->sendresponse(['id' => $customer->id], 'OTP resent successfully.');
    }

}
