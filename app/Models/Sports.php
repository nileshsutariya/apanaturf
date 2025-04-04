<?php

namespace App\Models;

use App\Models\Images;
use Intervention\Image\Image;
use Illuminate\Database\Eloquent\Model;

class Sports extends Model
{
    protected $table = "sports";
    protected $primaryKey = "id";
    protected $fillable = [
        'name', 'image_id'
    ];
    
}
