<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileVendorController extends Controller
{
    public function index()
    {
        return view('vendor.profile.profile');
    }
}
