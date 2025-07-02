<?php

namespace App\Http\Controllers\Vendor;

use Carbon\Carbon;
use App\Models\Booking;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = DB::table('booking')
            ->join('customer', 'booking.customer_id', '=', 'customer.id')
            ->select(
                'booking.id',
                'customer.name as customer_name', 
                'booking.booking_on', 
                'booking.time_in', 
                'booking.time_out',
                'booking.status'
            )
            ->get()
            ->map(function ($booking) {
                return [
                    'id' => $booking->id,
                    'customer_name' => $booking->customer_name,
                    'booking_on' => $booking->booking_on,
                    'time_in' => Carbon::parse($booking->time_in)->format('gA'), 
                    'time_out' => Carbon::parse($booking->time_out)->format('gA'), 
                    'status' => $booking->status
                ];
            });
            // print_r($bookings); die;

        return view('vendor.booking.booking', ['bookingsFromDB' => $bookings]);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'booking_on' => 'required|string',
            'time_in' => 'required|string',
            'time_out' => 'nullable|string',
            'status' => 'required|in:0,1',
        ]);

        $bookingDate = Carbon::parse($request->booking_on)->format('Y-m-d');
        $timeIn = Carbon::createFromFormat('gA', strtoupper(trim($request->time_in)))->format('H:i:s');

        $timeOut = null;
        if (!empty($request->time_out)) {
            $timeOut = Carbon::createFromFormat('gA', strtoupper(trim($request->time_out)))->format('H:i:s');
        }

        if ($request->id) {
            $booking = Booking::find($request->id);
            if ($booking) {
                $booking->status = $request->status;
                $booking->time_out = $timeOut;
                $booking->save();
                return response()->json(['success' => true]);
            }
            return response()->json(['success' => false, 'message' => 'Booking not found']);
        }

        Booking::create([
            'customer_name' => $request->customer_name,
            'booking_on'    => $bookingDate,
            'time_in'       => $timeIn,
            'time_out'      => $timeOut,
            'status'        => $request->status,
        ]);

        return response()->json(['success' => true]);
    }

}
