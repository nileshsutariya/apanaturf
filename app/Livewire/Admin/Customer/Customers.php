<?php

namespace App\Livewire\Admin\Customer;

use Livewire\Component;
use App\Models\Customer;
use Livewire\WithPagination;

class Customers extends Component
{
    use WithPagination;
    public $name, $email, $phone, $balance, $cid;
    public $search;
    
    public $editmode = false;

    public $showModal = false;
    
    public function mount()
    {
        $this->resetPage();
    }
    public function render()
    {
        // print_r($this->nameSearch);
        // print_r($this->phoneSearch);
        // print_r($this->typeSearch);
        // print_r($this->balanceSearch);
        // print_r($this->emailSearch);
        // die;
        $customers = Customer::where('name', 'like', '%' . $this->search . '%')
        ->orWhere('phone', 'like', '%' . $this->search . '%')
        ->orWhere('email', 'like', '%' . $this->search . '%')
        ->orWhere('balance', 'like', '%' . $this->search . '%');
        
      
        $this->dispatch('livewire:updated');

        return view('livewire.admin.customer.customers', [
            'customers' =>$customers->paginate(10)
        ])->layout('livewire.admin.component.layouts.app');
    }

    public function updated($field)
    {
        if ($this->cid) {
            $this->validateOnly($field, [
                'name' => 'required|string|min:3|max:255',
                'email' => 'required|email|unique:customer,email,' . $this->cid,
                'phone' => 'required|unique:customer,phone,' . $this->cid,
                'balance' => 'required|numeric|min:0',
            ]);
        } else {
            $this->validateOnly($field, [
                'name' => 'required',
                'phone' => 'required|numeric|digits:10',
                'balance' => 'required|numeric|min:0',
                'email' => 'required|email|unique:customer,email',
            ]);
        }
    }
    public function openModal()
    {
        $this->resetValidation(); 
        $this->showModal = true;
        $this->dispatch('open-modal');
    }

    public function closeModal()
    {
        $this->resetInputFields();
        $this->editmode = false;
        $this->showModal = false;
        $this->dispatch('close-modal');
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->balance = '';
        $this->cid = '';
    }
    protected function rules()
    {
        // print_r($this->cid);die;
        if ($this->cid) {
            return [
                'name' => 'required|string|min:3|max:255',
                'email' => 'required|email|unique:customer,email,' . $this->cid,
                'phone' => 'required|unique:customer,phone,' . $this->cid,
                'balance' => 'required|numeric|min:0',
            ];
        } else {
            return [
                'name' => 'required|string',
                'email' => 'required|email|unique:customer,email',
                'phone' => 'required|string|unique:customer,phone',
                'balance' => 'required|numeric|min:0',
            ];
        }
    }

    public function update()
    {
        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'balance' => $this->balance
        ];

        if ($this->cid) {
            $this->validate();
            customer::where('id', $this->cid)->update($data);
            session()->flash('message', 'customer updated successfully!');
        } else {
            $this->validate();
            customer::create($data);
            session()->flash('message', 'customer added successfully!');
        }
        $this->closeModal();
    }

    public function edit($id)
    {
        $c = Customer::find($id);
        $this->name = $c->name;
        $this->email = $c->email;
        $this->phone = $c->phone;
        $this->balance = $c->balance;
        $this->cid = $c->id;
        $this->editmode = true;
        // print_r($this->cid);die;
        $this->openModal();

    }

}