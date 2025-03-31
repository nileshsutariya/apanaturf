<?php

namespace App\Livewire\Admin\User;

use Livewire\Component;
use App\Models\User;

class Users extends Component
{
    public $users;
    public function render()
    {
        $users = $this->users = User::all();
        // print_r($users); die;

        return view('livewire.admin.user.users')->layout('livewire.admin.component.layouts.app');;
    }
}
