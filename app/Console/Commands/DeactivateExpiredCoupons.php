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
            $coupon->update(['status' => 0]);
        }

        $this->info(count($expiredCoupons) . ' coupons deactivated.');

        $bookings = Booking::with(['coupon', 'transaction'])
                            ->where('status', "1") 
                            ->get();

        foreach ($bookings as $booking) {
            $coupon = $booking->coupon; 
            $transaction = $booking->transaction;
    
            if ($transaction?->status == 2 && $coupon?->transaction_limit) {
                    
                $bookingCount = Booking::where('coupons_id', $coupon->id)
                            // ->whereNull('canceled_on')
                            ->where('status', '1')  
                            ->whereHas('transaction', function ($query) {
                                $query->where('status', '2'); 
                            })
                            ->count();

                if ($bookingCount >= $coupon->transaction_limit) {
                    $coupon->update(['status' => 0]);

                    $message = "Coupon ID {$coupon->id} deactivated (used {$bookingCount} times).";
                    $this->info($message);
                    Log::info($message);
                }   
            }
        }
    }
}
