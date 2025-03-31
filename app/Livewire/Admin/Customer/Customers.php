<?php

namespace App\Livewire\Admin\Customer;

use Livewire\Component;
use App\Models\Customer;

class Customers extends Component
{
    public $customer;
    public function render()
    {
        $customers = Customer::all();
// print_r($customers);die;
        return view('livewire.admin.customer.customer');
    }
}
