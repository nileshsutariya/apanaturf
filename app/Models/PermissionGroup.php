<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PermissionGroup extends Model
{
    protected $table = 'permissions_group';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'status'];

}
