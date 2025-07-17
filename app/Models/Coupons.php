<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Coupons extends Model
{
    protected $table = 'coupons_and_offers';
    protected $id = 'id';
    protected $fillable = ['coupons_name', 'transactionlimit', 'status', 'coupons_code', 'start_date', 'end_date', 'min_order', 'discount_in_per', 'discount_in_ruppee', 'created_by'];
    public function creaters()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function turf()
    {
        return $this->belongsTo(Turf::class, 'turf_id');
    }
    public function creator()
    {
        return $this->morphTo();
    }
    
}
