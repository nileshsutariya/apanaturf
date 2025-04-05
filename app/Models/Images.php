<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $table = 'images';
    protected $primaryKey = 'id';
    protected $fillable = ['image_name', 'image_path', 'reference_name', 'reference_id'];
    
}
