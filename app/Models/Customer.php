<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';
    protected $primaryKey = 'id';
    protected $fillable = ['unique_id', 'name', 'email', 'phone', 'password', 'balance', 'profile_image'];

}
