<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Booking;
use App\Models\Coupons;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DeactivateExpiredCoupons extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'coupons:check-validity';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deactivate coupons that are expired or reached transaction limit';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $today = Carbon::today();

        $expiredCoupons = Coupons::where('status', 1)
            ->whereDate('end_date', '<=', $today)
            ->get();

        foreach ($expiredCoupons as $coupon) {
            $coupon->status = 0;
            $coupon->save();
        }

        $this->info(count($expiredCoupons) . ' coupons deactivated.');


        $bookings = Booking::with(['coupon', 'transaction'])
                            ->where('status', "1") 
                            ->get();

        Log::info('Found ' . $bookings->count() . ' bookings');

        foreach ($bookings as $booking) {
            $coupon = $booking->coupon; 
            $transaction = $booking->transaction;
    
            Log::info('Checking Booking ID ' . $booking->id . ' - Coupon ID: ' . ($coupon->id ?? 'None'));
            Log::info('Transaction Status: ' . ($transaction->status ?? 'None'));

            if ($transaction && $transaction->status == 2) {
                Log::info("Transaction status is 2");

                if ($coupon && $coupon->transaction_limit) {
                    Log::info("Coupon has a transaction limit: " . $coupon->transaction_limit);
                    
                    $bookingCount = Booking::where('coupons_id', $coupon->id)
                                ->where('status', '1')  
                                ->whereHas('transaction', function ($query) {
                                    $query->where('status', '2'); 
                                })
                                ->count();

                    Log::info('Booking Count for Coupon ' . $coupon->id . ': ' . $bookingCount);
                    if ($bookingCount >= $coupon->transaction_limit) {
                        $coupon->status = 0;
                        $coupon->save();
    
                        $message = "Coupon ID {$coupon->id} deactivated (used {$bookingCount} times).";
                        $this->info($message);
                        Log::info($message);
                    }
                }    
            }

        }
    }

}
