<?php

namespace App\Livewire\Admin\Sport;

use App\Models\Sports;
use Livewire\Component;

class Sport extends Component
{
    public $sports;
    public function mount()
    {
        $this->sports = Sports::fetchSportsData();
        // print_r($this->sports); die;
    }

    public function render()
    {
        return view('livewire.admin.user.sports');
    }
}
