<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Amenity extends Model
{
    protected $table = "amenities";
    protected $primaryKey = "id";
    protected $fillable = [
        'name', 'image_id'
    ];
    public function turf()
    {
        return $this->belongsTo(Turf::class);
    }
    public function image()
    {
        return $this->belongsTo(Images::class, 'image_id');
    }
}
