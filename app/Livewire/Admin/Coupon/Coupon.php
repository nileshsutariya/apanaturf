<?php

namespace App\Livewire\Admin\Coupon;

use Carbon\Carbon;
use App\Models\Coupons;
use Livewire\Component;
use Livewire\WithPagination;

class Coupon extends Component
{
    use WithPagination; 
    public $codeSearch = '';
    public $createdateSearch = '';
    public $createdbySearch = '';
    public $nameSearch = '';
    public $validitySearch = '';
    public $discountSearch = '';

    public $showModal = false;
    public $showinfoModal = false;
    public $selectedCoupon;
    public $allcoupons;

    public $coupons_code, $created_at, $created_by, $coupons_name, $start_date, $end_date, $discount_in_ruppee, $discount_in_per, $min_order;
    public function render()
    {
        $coupons = Coupons::query(); 
        
        if (!empty($this->codeSearch)) {
            $coupons->where('coupons_code', 'like', '%' . $this->codeSearch . '%');
        }
    
        if (!empty($this->createdateSearch)) {
            $coupons->whereDate('created_at', 'like', '%' . $this->createdateSearch . '%');
        }
    
        if (!empty($this->createdbySearch)) {
            $coupons->whereHas('creaters', function ($query) {
                $query->where('name', 'like', '%' . $this->createdbySearch . '%');
            });        
        }
    
        if (!empty($this->nameSearch)) {
            $coupons->where('coupons_name', 'like', '%' . $this->nameSearch . '%');
        }
        
        if (!empty($this->validitySearch)) {
            $coupons->whereDate('start_date', 'like', '%' . $this->validitySearch . '%');
        }
        
        if (!empty($this->searchType)) {
            $coupons->where('discount_in_ruppee', 'like', '%' . $this->searchType . '%');
        }

        return view('livewire.admin.coupon.coupon', [
            'coupons' => $coupons->paginate(5),
        ])->layout('livewire.admin.component.layouts.app');
    }
    public function mount()
    {
        $this->resetPage();
        $this->allcoupons = Coupons::getcoupons(); 
        $this->resetInputFields();
    }
    public function openModal()
    {
        $this->showModal = true;
        $this->dispatch('open-modal');
    }
    public function openinfoModal($id)
    {
        $this->selectedCoupon = Coupons::with('creaters')->find($id);
        $this->showinfoModal = true;
        $this->dispatch('open-modal');
    }
    private function resetInputFields()
    {
        $this->coupons_name = '';
        $this->start_date = '';
        $this->end_date = '';
        $this->min_order = '';
        $this->discount_in_per = '';
        $this->discount_in_ruppee = '';
        $this->created_by = '';
    }

    public function closeModal()
    {
        $this->resetInputFields();
        $this->showModal = false;
        $this->showinfoModal = false;
        $this->dispatch('close-modal');
    }
    public function couponsadd()
    {
        $data = [
            'coupons_name' => $this->coupons_name,
            'start_date' => Carbon::createFromFormat('d/m/Y', $this->start_date)->format('Y-m-d'),
            'end_date' => Carbon::createFromFormat('d/m/Y', $this->end_date)->format('Y-m-d'),
            'discount_in_per' => $this->discount_in_per,
            'discount_in_ruppee' => $this->discount_in_ruppee,
            'min_order' => $this->min_order,
        ];
        $this->validate([
            'coupons_name' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'discount_in_per' => 'required',
            'discount_in_ruppee' => 'required',
            'min_order' => 'required',
            // 'created_by' => 'required|integer',
        ]);
        Coupons::storeCoupon($data);

        session()->flash('message', 'Coupon created successfully!');

        $this->resetInputFields();
        $this->closeModal();

    }
}
