<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerInfo extends Model
{
    protected $table = 'customer_info';
    // protected $primaryKey = 'id';
    public $timestamps = false; 

    protected $fillable = [
        'latitude',
        'longitude',
        'customer_id',
        'fcm_token',
    ];
}
