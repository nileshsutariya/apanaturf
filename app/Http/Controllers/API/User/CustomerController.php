<?php

namespace App\Http\Controllers\API\User;

use App\Models\Images;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\API\BaseController;

class CustomerController extends BaseController
{
    public function customerupdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'nullable|exists:customer,id', 
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users,email,' . $request->id, 
            'phone' => 'required|string|max:10',
            'password' => 'required|string',
            'confirmpassword' => 'required|same:password',
            // 'profile_image' => 'required|exists:images,id',
        ]);

        if ($validator->fails()) {
            return $this->senderror(['errors' => $validator->errors()->all()]);
        }

        if ($request->id) {
            $customers = Customer::findOrFail($request->id);

            $image_id = $customers->profile_image;

            if ($request->hasFile('profile_image')) {
                $file = $request->file('profile_image');
                $filename = time() . '_' . $file->getClientOriginalName();
                $filepath = $file->storeAs('admin_image', $filename, 'public');

                $image = Images::create([
                    'image_name' => $filename,
                    'image_path' => $filepath,
                    'reference_name' => 'customers',
                    'reference_id' => $customers->id, 
                ]);

                $image_id = $image->id; 
            }

            $customers->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
                'balance' => $request->balance,
                'profile_image' => $image_id, 
            ]);

            return $this->sendresponse($customers, 'Customer updated successfully');
        } else {
            $image_id = null;

            if ($request->hasFile('profile_image')) {
                $file = $request->file('profile_image');
                $filename = time() . '_' . $file->getClientOriginalName();
                $filepath = $file->storeAs('admin_image', $filename, 'public');

                $image = Images::create([
                    'image_name' => $filename,
                    'image_path' => $filepath,
                    'reference_name' => 'customers',
                    'reference_id' => 0, 
                ]);

                $image_id = $image->id; 
            }

            $customers = Customer::create([
                'unique_id' => uniqid(),
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
                'balance' => $request->balance,
                'profile_image' => $image_id, 
            ]);
            if ($image_id) {
                $image->update(['reference_id' => $customers->id]);
            }

            return $this->sendresponse($customers, 'Customer registered successfully');
        }
    }
    public function customerlist(Request $request) 
    {
        $query = Customer::query();

        $validator = Validator::make($request->all(), [
            'filter_param.id' => 'nullable|exists:customer,id',
            'order.column' => 'nullable|string|in:name,email,phone,id', 
            'order.dir' => 'nullable|string|in:asc,desc', 
        
        ]);
        if($validator->fails()){
            return $this->senderror( ['errors' => $validator->errors()->all()]);
        }

        if ($request->has('filter_param.id') && !empty($request->input('filter_param.id'))) {
            $query->where('id', $request->input('filter_param.id'));
        }

        if (!empty($request->input('search.value'))) {
            $searchValue = $request->input('search.value');
            $query->where(function($q) use ($searchValue) {
                $q->where('name', 'LIKE', "%{$searchValue}%")
                ->orWhere('email', 'LIKE', "%{$searchValue}%")
                ->orWhere('phone', 'LIKE', "%{$searchValue}%");
            });
        }
        $sortColumn = $request->input('order.column', 'id'); 
        $sortDirection = $request->input('order.dir', 'asc');
    
        $query->orderBy($sortColumn, $sortDirection);
    
        $users = $query->offset($request->start*$request->length)->limit($request->length)->get();

        return $this->sendresponse($users, 'Customer List');
    }
}
