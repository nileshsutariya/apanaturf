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
    protected $fillable = ['unique_id', 'name', 'email', 'phone', 'password', 'balance', 'profile_image'];

    // public function createCustomer($this)
    // {
    //     return self::create([
    //         'name' => $this->name,
    //         'email' => $this->email,
    //         'phone' => $this->phone,
    //         'balance' => $this->balance ?? 0,
    //     ]);
    // }
}
