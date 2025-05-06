<?php

namespace App\Models;

use App\Models\Booking;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;
    protected $table = 'transaction';
    protected $primaryKey = 'id';
    protected $fillable = [
        'transfer_by_customer_id',
        'transaction_id',
        'date',
        'amount',
        'transaction_type',
        'method',
        'status',
    ];
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'transfer_by_customer_id');
    }
    public function bookings()
    {
        return $this->hasMany(Booking::class, 'transaction_id');
    }
}
