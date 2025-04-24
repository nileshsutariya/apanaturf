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

    public static function deletebanner($id)
    {
        $banner = self::find($id);

        if (!$banner) {
            return null;
        }
    
        $image = Images::find($banner->image_id);
        $banner->delete();
    
        if ($image) {
            if (Storage::disk('public')->exists($image->image_path)) {
                Storage::disk('public')->delete($image->image_path);
            }
            $image->delete();
        }
        return ['message' => 'Sport deleted successfully'];

    }
    
}
