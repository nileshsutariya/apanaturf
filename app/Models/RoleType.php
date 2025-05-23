<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RoleType extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'code'];

    protected $table = 'role_type';
    protected $primaryKey='id';
}
