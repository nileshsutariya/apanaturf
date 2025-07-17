<?php

namespace App\Http\Controllers\Vendor;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RequestController extends Controller
{
    public function index()
    {
        $bookings = Booking::with(['customer', 'turf'])->get();

        return view('vendor.request.request', compact('bookings'));
    }
}
