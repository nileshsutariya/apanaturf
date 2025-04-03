<?php

namespace App\Livewire\Admin\User;

use Livewire\Component;
use App\Models\User;

class Users extends Component
{
    public $users;
    public $name, $email, $phone, $type;

    protected $rules = [
        'name' => 'required|string|min:3|max:255',
        'email' => 'required|email|unique:users,email',
        'phone' => 'required|numeric|digits:10',
        'type' => 'required|string',
    ];

    public function save()
    {
        $this->validate();

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'role_id' => $this->type, // Ensure this column exists
        ]);

        session()->flash('success', 'User Registered Successfully!');
        $this->reset(['name', 'email', 'phone', 'type']);
        
        // Refresh user list after adding a new user
        $this->users = User::all();
    }
    public function mount()
    {
        $this->users = User::getdata(); 
        $this->reset(['name', 'email', 'phone', 'type']);

    }
    public function render()
    {
        // $users = $this->users = User::all();
        // print_r($users); die;
        
        return view('livewire.admin.user.users')->layout('livewire.admin.component.layouts.app');
    }

}
