<?php

namespace App\Models;

use Laravel\Passport\HasApiTokens;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable implements JWTSubject
{
    use HasApiTokens, WithPagination, WithoutUrlPagination; 

    protected $table = 'customer';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'email', 'phone', 'balance'];
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }
    public function locationHistories()
    {
        return $this->hasMany(LocationHistory::class);
    }

    public function latestLocation()
    {
        return $this->hasOne(LocationHistory::class)->latestOfMany();
    }
    public static function createCustomer($data)
    {
        return self::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'balance' => $data['balance']
        ]);

    }
}
