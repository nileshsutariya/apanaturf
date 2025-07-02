<?php

namespace App\Models;

use App\Models\Coupons;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'booking';
    protected $primaryKey = 'id';
    protected $fillable = [
        'booking_on',
        'venues_id',
        'customer_id',
        // 'sports_ids',
        // 'amenities_ids',
        // 'coupons_id',
        // 'transaction_id',
        // 'turf_id',
        // 'settlement',
        // 'canceled_on',
        // 'total_amount',
        // 'discount',
        // 'tax',
        // 'paid_amount',
        // 'remaining_amount',
        // 'paid_status',
        // 'payment_type',
        'time_in',
        'time_out',
        // 'spot',
        // 'timing',
        // 'booked_by',
        // 'status',
    ];
    // public function venue()
    // {
    //     return $this->belongsTo(Venue::class, 'venues_id');
    // }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function coupon()
    {
        return $this->belongsTo(Coupons::class, 'coupons_id');
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transaction_id');
    }

    public function turf()
    {
        return $this->belongsTo(Turf::class, 'turf_id');
    }

    public function spot()
    {
        return $this->belongsTo(Turf::class, 'spot');
    }
}
