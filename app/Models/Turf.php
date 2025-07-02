<?php

namespace App\Models;

use App\Models\TurfTiming;
use Illuminate\Database\Eloquent\Model;

class Turf extends Model
{
    protected $table = 'turf';
    protected $primaryKey = 'id';

     protected $fillable = [
        'name',
        'sports_ids',
        'amenities_ids',
        'location_link',
        'location_text',
        // 'feature_image',
        'turf_image',
        'height',
        'width',
        'length',
        // 'sessions',
        'booking_price',
        'unit',
        'description',
        'venue_id', 
        'created_by'
    ];
    public function venue()
    {
        return $this->belongsTo(Venues::class, 'vendor_id', 'id');
    }
    public function timings()
    {
        return $this->hasMany(TurfTiming::class, 'turf_id'); 
    }
    public function sports()
    {
        return $this->hasMany(Sports::class); 
    }
    public function amenities()
    {
        return $this->hasMany(Amenity::class); 
    }
    public function images()
    {
        return $this->hasMany(Images::class); 
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
