<?php

namespace App\Livewire\Admin\Sport;

use Livewire\Component;

class Sport extends Component
{
    public $sports;
    public function mount()
    {
        $this->sports = Sport::fetchSportsData();
        // print_r($this->sports); die;
    }

    public function render()
    {
        return view('livewire.admin.user.sports');
    }
}
