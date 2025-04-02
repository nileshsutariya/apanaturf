<?php

namespace App\Livewire\Admin\Customer;

use Livewire\Component;
use App\Models\Customer;
use Livewire\WithPagination;

class Customers extends Component
{
    use WithPagination; 
    public function render()
    {
        return view('livewire.admin.customer.customers', [
            'customers' => Customer::paginate(2),
        ])->layout('livewire.admin.component.layouts.app'); 
    }
}