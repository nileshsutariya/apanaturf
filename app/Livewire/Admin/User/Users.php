<?php

namespace App\Livewire\Admin\User;

use App\Models\Role_type;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination; 
    public $searchName = '';
    public $searchEmail = '';
    public $searchMobile = '';
    public $searchType = '';
    public $roles; 

    public $name, $email, $phone, $role_id;
    public $showModal = false; 
    public $isEditMode = false; // Track mode

    public $uid;
    public function updatingSearchName()
    {
        $this->resetPage(); // Reset pagination when searching
    }
    public function updated($field)
    {
        if ($this->uid) {
            $this->validateOnly($field, [
                'name' => 'required|string|min:3|max:255',
                'email' => 'required|email|unique:users,email,' . $this->uid,
                'phone' => 'required|unique:users,phone,' . $this->uid,
            ]);
        } else {
            $this->validateOnly($field, [
                'name' => 'required',
                'phone' => 'required|numeric|digits:10',
                'email' => 'required|email|unique:users,email',
            ]);
        }
    }
 
    public function render()
    {
        $users = User::query(); 
    
        if (!empty($this->searchName)) {
            $users->where('name', 'like', '%' . $this->searchName . '%');
        }
    
        if (!empty($this->searchEmail)) {
            $users->where('email', 'like', '%' . $this->searchEmail . '%');
        }
    
        if (!empty($this->searchMobile)) {
            $users->where('phone', 'like', '%' . $this->searchMobile . '%');
        }
    
        if (!empty($this->searchType)) {
            $users->where('role_id', 'like', '%' . $this->searchType . '%');
        }
    
        return view('livewire.admin.user.users', [
            'users' => $users->paginate(5),
        ])->layout('livewire.admin.component.layouts.app');
    }
    


    public function mount()
    {
        $this->resetPage();
        $this->users = User::getdata(); 
        $this->roles = Role_type::all(); 

        $this->reset(['name', 'email', 'phone', 'role_id']);

    }
    // public $users;
    public function openModal()
    {
        // $this->resetInputFields();
        $this->showModal = true;
        $this->dispatch('open-modal');

    }

    public function closeModal()
    {
        $this->resetInputFields();
        $this->showModal = false;
        $this->dispatch('close-modal');

    }
    private function resetInputFields()
    {
        $this->uid = '';
        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->role_id = '';
        $this->isEditMode = false;

    }
    protected function rules()
    {
        return [
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|email|unique:users,email,' . $this->uid,
            'phone' => 'required|numeric|digits:10',
            'role_id' => 'required|exists:role_type,id',
        ];
    }

    public function edit($id)
    {
        $u = User::find($id);
       
        if ($u) {
            $this->name = $u->name;
            $this->email = $u->email;
            $this->phone = $u->phone;
            $this->role_id = $u->role_id;
            $this->uid = $u->id;
            $this->isEditMode = true;
            $this->openModal();
        }
    }

    public function save()
    {

        $this->validate();

        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'role_id' => $this->role_id,
        ];

        if ($this->uid) {
            User::where('id', $this->uid)->update($data);
            session()->flash('message', 'User updated successfully!');
        } else {
            User::storeUser($data);
            session()->flash('message', 'User added successfully!');
        }

        $this->resetInputFields();
        // session()->flash('message', 'User added successfully!');
        $this->closeModal();
    }
   
   

}
