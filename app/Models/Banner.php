<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Banner extends Model
{
    protected $table = "banner";
    protected $primaryKey = "id";
    protected $fillable = [
         'image_id'
    ];
    public function image() {
        return $this->belongsTo(Images::class, 'image_id');
    }    
}
