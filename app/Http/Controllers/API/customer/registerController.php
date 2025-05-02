<?php

namespace App\Http\Controllers\API\customer;

use Carbon\Carbon;
use App\Models\Images;
use App\Models\Customer;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\API\BaseController as BaseController;


class registerController extends BaseController
{
    public function register(Request $request)
    {        
        $request->validate([
            'name' => 'required',
            'email' => 'email|unique:customer,email',
            'phone' => 'required|digits:10|unique:customer,phone',
            'password' => 'required|min:8',
        ]);

        $customer = new Customer();
        $customer->unique_id = uniqid();
        $customer->name = $request['name'];
        $customer->email = $request['email'] ?? NULL;
        $customer->phone = $request['phone'];
        $customer->password = Hash::make($request['password']);
        $customer->balance = $request['balance'] ?? 0;
        $customer->otp = 1234;
        $customer->otp_send_at = Carbon::now();
        $customer->save();
        
        return $this->sendresponse($customer->makeHidden(['password', 'otp']), 'Customer registered successfully');
    }

    public function profile(Request $request)
    {
        $customer = Auth::guard('customer')->user();

        if (!$customer) return $this->senderror('Unauthorized', ['error' => 'User not authenticated']);
        if (!$request->hasFile('profile_image')) return $this->senderror('No image uploaded', ['error' => 'Please upload a profile image']);

        $file = $request->file('profile_image');
        $filename = time() . '_' . $file->getClientOriginalName();
        $filepath = $file->storeAs('customer_image', $filename, 'public');

        $image = Images::create([
            'image_name' => $filename,
            'image_path' => $filepath,
            'reference_name' => 'customer',
            'reference_id' => $customer->id,
        ]);

        $customer->update(['profile_image' => $image->id]);
        $customer['profile_image'] = $image->image_name;
        return $this->sendresponse($customer->makeHidden(['password', 'otp', 'otp_send_at', 'otp_verified_at', 'location_history', 'email_verified_at', 'remember_token']), 'Profile image uploaded successfully');
    }

}
