<?php

namespace App\Livewire\Admin\User;

use Livewire\Component;
use App\Models\User;

class Users extends Component
{
    public $users;
    public $name, $email, $phone, $type, $balance;

    public function mount()
    {
        $this->users = User::getdata(); 
    }
    public function render()
    {
        // $users = $this->users = User::all();
        // print_r($users); die;
        
        return view('livewire.admin.user.users', ['users' => $this->users])->layout('livewire.admin.component.layouts.app');;
    }

    public function addUser()
    {
        $validatedData = $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'phone' => 'required|string|max:15',
            'type' => 'required|in:User,Vender',
            'balance' => 'required|numeric',
        ]);

        User::addUser($validatedData);

        $this->users = User::getdata();

        $this->reset(['name', 'email', 'phone', 'type', 'balance']);
    }

}
