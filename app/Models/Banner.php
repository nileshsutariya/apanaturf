<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
    public static function createbanner($image_id)
    {
        $banner = self::create([
            'image_id' => $image_id,
        ]);
    
        if ($banner && $image_id) {
            Images::where('id', $image_id)->update(['reference_id' => $banner->id]);
        }
    
        return $banner;
    }
    
}
