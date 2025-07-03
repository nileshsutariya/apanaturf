<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PermissionGroup extends Model
{
    protected $table = 'permission_group';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'status'];

}
