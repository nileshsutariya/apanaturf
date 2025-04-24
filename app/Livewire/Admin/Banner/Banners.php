<?php

namespace App\Livewire\Admin\Banner;

use App\Models\Banner;
use App\Models\Images;
use Livewire\Component;
use Livewire\WithFileUploads;


class Banners extends Component
{
    use WithFileUploads;

    public $image_id;

    public $showModal = false;
    public function openModal()
    {
        $this->resetValidation(); 
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
        $this->image_id = '';
    }
    public function render()
    {
        $banner = Banner::leftJoin('images', 'banner.image_id', '=', 'images.id')
        ->select('banner.*', 'images.image_path')->get();
        return view('livewire.admin.banner.banners', [
            'banner' => $banner
        ])->layout('livewire.admin.component.layouts.app');
    }


    public function addbanner(){
        $this->validate([
            'image_id' => 'required|image',
        ]);
        $file = $this->image_id;
        // Store image
        $filename = time() . '_' . $file->getClientOriginalName();
        $filepath = $file->storeAs('admin_image', $filename, 'public');

        $image = Images::create([
            'image_name' => $filename,
            'image_path' => $filepath,
            'reference_name' => 'banner',
            'reference_id' => 0,
        ]);
        $image_id=$image->id;

        Banner::createbanner($image_id);

        session()->flash('message', 'Sport added successfully!');
        $this->reset(['image_id']);
        $this->closeModal();
    }
    public function bannerdelete($id)
    {
        $result = Banner::deletebanner($id);
        if ($result) {
            session()->flash('message', $result['message']);
        } else {
            session()->flash('message', 'banner not found.');
        }
    }
}
