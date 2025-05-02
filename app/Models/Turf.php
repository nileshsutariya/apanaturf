<?php

namespace App\Models;

use App\Models\TurfTiming;
use Illuminate\Database\Eloquent\Model;

class Turf extends Model
{

    protected $table = 'turf';
    protected $primaryKey = 'id';
    public function timings()
    {
        return $this->hasMany(TurfTiming::class, 'turf_id'); 
    }
    public function sports()
    {
        return $this->belongsToMany(Sports::class, 'sports_ids'); 
    }

    public function amenities()
    {
        return $this->belongsToMany(Amenity::class, 'amenities_ids'); 
    }
    public function images()
    {
        return $this->hasMany(Images::class, 'reference_id'); 
    }
    public function coupons()
    {
        return $this->hasMany(Coupons::class, 'turf_id'); 
    }
    public function featureImage()
    {
        return $this->belongsTo(Images::class, 'feature_image');
    }
    public function turfImage()
    {
        return $this->hasMany(Images::class, 'id', 'turf_image'); 
    }
}
