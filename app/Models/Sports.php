<?php

namespace App\Models;

use App\Models\Images;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Sports extends Model
{
    protected $table = "sports";
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
