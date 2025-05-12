<?php

namespace App\Models;

use App\Models\Coupons;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Venues extends Authenticatable
{
    protected $table = 'venues';
    protected $primaryKey = 'id';
    public function coupons()
    {
        return $this->hasOne(Coupons::class, 'turf_id', 'turf_id');
    }
}
