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
    
        // $fieldType = filter_var($loginInput, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';
    
        // $credentials = [
        //     $fieldType => $loginInput,
        //     'password' => $password,
        // ];
    
        
        $credentials = [
            'phone' => $loginInput,
            'password' => $password,
        ];

        if (!$token = Auth::guard('customer')->attempt($credentials)) {
            return $this->senderror('Unauthorised.', ['error' => 'Invalid credentials']);
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
        return $this->sendresponse($success, 'User login successfully.');
    }
    


    // public function login(Request $request)
    // {
    //     $credentials = $request->only(['email', 'password']);
    
    //     if (!$token = Auth::guard('customer')->attempt($credentials)) {
    //         return $this->senderror('Unauthorised.', ['error' => 'Invalid credentials']);
    //     }
    
    //     // Get the logged-in user
    //     $user = Auth::guard('customer')->user();
    
    //     // Get latitude and longitude from request
    //     $latitude = $request->input('latitude');
    //     $longitude = $request->input('longitude');
    
    //     // Store in database if available
    //     if ($latitude && $longitude) {
    //         $user->latitude = $latitude;
    //         $user->longitude = $longitude;
    //         $user->save();
    //     }
    
    //     $success = $this->respondWithToken($token);
    //     return $this->sendresponse($success, 'User login successfully.');
    // }
    



    // public function login(Request $request)
    // {
    //     $credentials = $request->only('email', 'password');
    
    //     if (!$token = Auth::guard('customer')->attempt($credentials)) {
    //         return $this->senderror('Unauthorised.', ['error' => 'Invalid credentials']);
    //     }
    
    //     // $user = Auth::guard('customer')->user();
    //     $ip = $request->header('X-Forwarded-For') ? explode(',', $request->header('X-Forwarded-For'))[0] : $request->ip();
    //     $currentUserInfo = Location::get($ip);
    //     // print_r($currentUserInfo); die;
        
    //     if ($currentUserInfo && isset($currentUserInfo->ip)) {
    //         // Proceed to store location info
    //         $location = new \App\Models\LocationHistory();
    //         $location->ip = $currentUserInfo->ip;
    //         $location->country = $currentUserInfo->country ?? 'Unknown';
    //         $location->region = $currentUserInfo->region ?? 'Unknown';
    //         $location->city = $currentUserInfo->city ?? 'Unknown';
    //         $location->latitude = $currentUserInfo->lat ?? null;
    //         $location->longitude = $currentUserInfo->lon ?? null;
    //         $location->customer_id = Auth::guard('customer')->id();
    //         $location->save();
    
    //         // Update user's location history
    //         $user = Auth::guard('customer')->user();
    //         $user->location_history = $location->id;
    //         $user->save();
    //     } else {
    //         // Handle failed geolocation lookup
    //         return $this->senderror('Location lookup failed', ['error' => 'Could not fetch location for this IP.']);
    //     }
    //     $success = $this->respondWithToken($token);
    //     return $this->sendresponse($success, 'User login successfully.');
    // }



    
    public function logout(Request $request)
    {
        Auth::guard('customer')->logout();
        return $this->sendresponse([], 'Successfully logged out.');
    } 

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


    // public function verifyotp(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'otp'   => 'required',
    //         'phone' => 'nullable|string',
    //     ]);
    
    //     if ($validator->fails()) {
    //         return $this->senderror(['errors' => $validator->errors()->all()]);
    //     }
    
    //     // CASE 1: Logged-in user via JWT token
    //     if (Auth::guard('customer')->check()) {
    //         $customer = Auth::guard('customer')->user();
    //     }
    //     // CASE 2: User is not logged in, verify by phone
    //     else if ($request->filled('phone')) {
    //         $customer = Customer::where('phone', $request->phone)->first();
    //     } else {
    //         return $this->senderror('Unauthorized or phone number required.');
    //     }
    
    //     if (!$customer) {
    //         return $this->senderror('Customer not found.');
    //     }
    
    //     // Check if OTP is expired (e.g. valid for 5 mins)
    //     if (!$customer->otp_send_at || now()->diffInSeconds(Carbon::parse($customer->otp_send_at)) > 300) {
    //         return $this->senderror('OTP expired or not found.');
    //     }
    
    //     // Compare OTPs
    //     if ((string) $customer->otp !== (string) $request->otp) {
    //         return $this->senderror('Invalid OTP.');
    //     }
    
    //     // Mark OTP as verified
    //     $customer->otp_verified_at = now();
    //     $customer->otp = null;
    //     $customer->save();
    
    //     return $this->sendresponse(['verified' => true], 'OTP verified successfully.');
    // }
    

    // public function verifyotp(Request $request)
    // {
    //     $data = $request->all();
    
    //     $validator = Validator::make($data, [
    //         'phone' => 'required',
    //         'otp'   => 'required',
    //     ]);
    
    //     if ($validator->fails()) {
    //         return $this->senderror(['errors' => $validator->errors()->all()]);
    //     }
    
    //     $customer = Customer::where('phone', $data['phone'])->first();
    
    //     if (!$customer) {
    //         return $this->senderror('Phone number not registered.');
    //     }
    
    //     if (!$customer->otp_send_at) {
    //         return $this->senderror('OTP not found. Please request again.');
    //     }
    
    //     if (now()->diffInSeconds(Carbon::parse($customer->otp_send_at)) > 300) { 
    //         return $this->senderror('OTP expired. Please request a new one.');
    //     }
    
    //     if ((string) $customer->otp !== (string) $data['otp']) {
    //         return $this->senderror('Invalid OTP. Please try again.');
    //     }
    
    //     $customer->otp_verified_at = now();
    //     $customer->otp = null;
    //     $customer->save();
    
    //     return $this->sendresponse(['verified' => true], 'OTP verified successfully.');
    // }

    //    public function verifyotp(Request $request)
//     {
//         $data = $request->all();

//         $validator = Validator::make($data, [
//             'otp' => 'required',
//         ]);

//         if ($validator->fails()) {
//             return $this->senderror(['errors' => $validator->errors()->all()]);
//         }

//         $customer = Auth::guard('customer')->user();

//         if (!$customer) {
//             return $this->senderror('Unauthorized user.');
//         }

//         if ($customer->otp_send_at) {
//             $diff = now()->diffInSeconds(Carbon::parse($customer->otp_send_at));

//             if ($diff > 60) {
//                 return $this->senderror('OTP expired.');
//             }
//         } else {
//             return $this->senderror('OTP not found.');
//         }

//         if ((string) $customer->otp === (string) $data['otp']) {
//             $customer->otp_verified_at = now();
//             $customer->otp = null;  
//             $customer->save();

//             return $this->sendresponse([], 'OTP verified successfully.');
//         }

//         return $this->senderror('Invalid OTP.');
//     }


}
