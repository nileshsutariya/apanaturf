<?php

namespace App\Http\Controllers\API\customer;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\API\BaseController as BaseController;


class registerController extends BaseController
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:customer|email',
            'phone' => 'required',
            'password' => 'required',
            'confirmpassword' => 'required|same:password',
        ]);
        if($validator->fails()){
            return $this->senderror( ['errors' => $validator->errors()->all()]);
        }
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->password = Hash::make($request->password);
        if ($customer->save()) {
            return $this->sendresponse($customer, 'Customer registered successfully');
        } 
    }
}
