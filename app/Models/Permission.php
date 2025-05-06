<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'Permissions';
    protected $primaryKey = 'id';
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
