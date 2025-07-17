<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SplitController extends Controller
{
    public function index()
    {
        return view('customer.split.split');
    } 
}
