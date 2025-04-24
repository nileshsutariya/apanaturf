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
        $data = $request->all();

        // $validator = Validator::make($data, [
        //     'name' => 'required',
        //     'email' => 'required|email|unique:customer,email',
        //     'phone' => 'required|unique:customer,phone',
        //     'password' => 'required',
        // ]);

        // if ($validator->fails()) {
        //     return $this->senderror(['errors' => $validator->errors()->all()]);
        // }


        $request->validate([
            'name' => 'required',
            'email' => 'email|unique:customer,email',
            'phone' => 'required|digits:10|unique:customer,phone',
            'password' => 'required|min:8',
        ]);

        $customer = new Customer();
        $customer->unique_id = uniqid();
        $customer->name = $data['name'];
        $customer->email = $data['email'] ?? NULL;
        $customer->phone = $data['phone'];
        $customer->password = Hash::make($data['password']);
        $customer->balance = $data['balance'] ?? 0;
        $customer->otp = 1234;
        $customer->otp_send_at = Carbon::now();
        $customer->save();
        
        $customer->makeHidden(['password', 'otp']);

        return $this->sendresponse($customer, 'Customer registered successfully');
    }

    public function profile(Request $request)
    {
        $customer = Auth::guard('customer')->user();

        if (!$customer) {
            return $this->senderror('Unauthorized', ['error' => 'User not authenticated']);
        }

        if (!$request->hasFile('profile_image')) {
            return $this->senderror('No image uploaded', ['error' => 'Please upload a profile image']);
        }

        $file = $request->file('profile_image');
        $filename = time() . '_' . $file->getClientOriginalName();
        $filepath = $file->storeAs('customer_image', $filename, 'public');

        $image = Images::create([
            'image_name' => $filename,
            'image_path' => $filepath,
            'reference_name' => 'customer',
            'reference_id' => $customer->id,
        ]);

        $customer->profile_image = $image->id;
        $customer->save();

        return $this->sendresponse($customer, 'Profile image uploaded successfully');
    }

}
