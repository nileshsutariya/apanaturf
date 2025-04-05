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
    public function image()
    {
        return $this->belongsTo(Images::class, 'image_id');
    }
    public static function sportslist()
    {
        return self::join('images', 'sports.image_id', '=', 'images.id')
        ->select('sports.id', 'sports.name', 'images.image_name');
    }
    public static function storesport($name, $image_id)
    {
        $sport = self::create([
            'name' => $name,
            'image_id' => $image_id,
        ]);
    
        if ($sport && $image_id) {
            Images::where('id', $image_id)->update(['reference_id' => $sport->id]);
        }
    
        return $sport;
    }
    public static function deletesport($id)
    {
        $sport = self::find($id);

        if (!$sport) {
            // return ['status' => false, 'message' => 'Sport not found.'];
            // return $this->senderror('', 'Sport not found.');
            return null;

        }
    
        $image = Images::find($sport->image_id);
        $sport->delete();
    
        if ($image) {
            if (Storage::disk('public')->exists($image->image_path)) {
                Storage::disk('public')->delete($image->image_path);
            }
            $image->delete();
        }
        return ['message' => 'Sport deleted successfully'];

    }
}
