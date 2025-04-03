<?php

namespace App\Models;

use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use WithPagination, WithoutUrlPagination; 

    protected $table = 'customer';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'email', 'phone', 'balance'];

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
