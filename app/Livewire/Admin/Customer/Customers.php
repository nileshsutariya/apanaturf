<?php

namespace App\Livewire\Admin\Customer;

use Livewire\Component;
use App\Models\Customer;

class Customers extends Component
{
    public $customers;
    public function render()
    {
        $this->customers = Customer::all();
// print_r($customers);die;
        return view('livewire.admin.customer.customers')->layout('livewire.admin.component.layouts.app');
    }
}
