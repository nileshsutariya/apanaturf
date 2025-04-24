<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TurfTiming extends Model
{
    protected $table = 'turf_timing';
    protected $primaryKey = 'id';
    public function turf()
    {
        return $this->belongsTo(Turf::class);
    }
}
