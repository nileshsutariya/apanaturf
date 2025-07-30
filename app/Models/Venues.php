<?php

namespace App\Models;

use App\Models\Coupons;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Venues extends Authenticatable
{
    protected $table = 'venues';
    protected $primaryKey = 'id';
    protected $fillable = [
        'turf_image', 'owner_name', 'owner_phone', 'owner_email',
        'vendor_image', 'vendor_id', 'city_id', 'area_id',
        'location_link', 'location_text', 'status', 'created_by'
    ];
    protected $casts = [
        'turf_image' => 'array',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function coupons()
    {
        return $this->morphMany(Coupons::class, 'creator');
    }
    public function turfImages()
    {
        return $this->hasMany(Images::class);
    }
    public function image()
    {
        return $this->belongsTo(Images::class, 'vendor_image');
    }
}
