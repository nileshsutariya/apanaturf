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
        // return view('livewire.admin.customer.customers')->layout('livewire.admin.component.layouts.app'); 
    }
    public $name, $email, $phone, $balance;
    public $showModal = false; // ✅ Declare the variable


    public function openModal()
    {
        $this->resetInputFields();
        $this->showModal = true;
        $this->dispatch('open-modal');

    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->dispatch('close-modal');

    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->balance = '';
    }

    public function storecustomerdata()
    {
        // print_r('gr555dfsr');die;
        $this->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:customer,email',
            'phone' => 'required|string|unique:customer,phone',
            'balance' => 'required|numeric',
        ]);

        Customer::createCustomer([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'balance' => $this->balance,
        ]);
        $this->resetInputFields();
        session()->flash('message', 'Customer added successfully!');
        $this->closeModal();        
    }
}