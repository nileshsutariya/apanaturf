<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LocationHistory extends Model
{
    protected $table = 'location_history';
    protected $primaryKey = 'id';
    protected $fillable = ['latitude', 'longitude', 'customer_id'];
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
