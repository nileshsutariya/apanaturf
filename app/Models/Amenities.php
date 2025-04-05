<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Amenities extends Model
{
    protected $table = "amenities";
    protected $primaryKey = "id";
    protected $fillable = [
        'name', 'image_id'
    ];
    public function image()
    {
        return $this->belongsTo(Images::class, 'image_id');
    }
    public static function amenitieslist()
    {
        return self::join('images', 'amenities.image_id', '=', 'images.id')
        ->select('amenities.id', 'amenities.name', 'images.image_name');
    }
    public static function storeamenities($name, $image_id)
    {
        $amenities = self::create([
            'name' => $name,
            'image_id' => $image_id,
        ]);
    
        if ($amenities && $image_id) {
            Images::where('id', $image_id)->update(['reference_id' => $amenities->id]);
        }
    
        return $amenities;
    }
    public static function deleteamenities($id)
    {
        $amenities = self::find($id);

        if (!$amenities) {
            // return ['status' => false, 'message' => 'amenities not found.'];
            // return $this->senderror('', 'amenities not found.');
            return null;

        }
    
        $image = Images::find($amenities->image_id);
        $amenities->delete();
    
        if ($image) {
            if (Storage::disk('public')->exists($image->image_path)) {
                Storage::disk('public')->delete($image->image_path);
            }
            $image->delete();
        }
        return ['message' => 'amenities deleted successfully'];

    }

}
