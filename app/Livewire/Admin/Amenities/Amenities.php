<?php

namespace App\Livewire\Admin\Amenities;

use App\Models\Images;
use App\Models\Amenity;
use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\ImageManager;

class Amenities extends Component
{
    use WithFileUploads;

    public $showModal = false;
    public $amenities;
    public $name, $image_id;

    public function mount()
    {
        $this->amenities = Amenity::amenitieslist()->get(); 
    }

    public function render()
    {
        $this->amenities = Amenity::amenitieslist()->get();

        return view('livewire.admin.amenities.amenities')->layout('livewire.admin.component.layouts.app');
    }

    public function openModal()
    {
        $this->showModal = true;
        $this->dispatch('open-modal');
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->image_id = '';
    }

    public function closeModal()
    {
        $this->resetInputFields();
        $this->showModal = false;
        $this->dispatch('close-modal');
    }

    public function removeamenity($id)
    {
        $result = Amenity::deleteamenities($id);

        if ($result) {
            session()->flash('message', $result['message']);
        } else {
            session()->flash('message', 'Amenity not found.');
        }

    }

    public function save()
    {
        $this->validate([
            'name' => 'required',
            'image_id' => 'required|image|mimes:png,webp,jpg,jpeg,svg|dimensions:width=150,height=150',
        ], [
            'image_id.required' => 'The image field is required.',
            'image_id.dimensions' => 'The image must be exactly 150x150 pixels.',
        ]);

        $imageFile = $this->image_id;
       
        $path = $imageFile->getRealPath(); // Livewire temp imageFile path
        $mime = $imageFile->getMimeType();

        $hasTransparency = false;
        if (in_array($mime, ['image/png', 'image/webp', 'image/jpg', 'image/jpeg', 'image/svg'])) {
            $image = null;

            if ($mime === 'image/png') {
                $image = imagecreatefrompng($path);
            } elseif ($mime === 'image/webp') {
                $image = imagecreatefromwebp($path);
            } elseif ($mime === 'image/jpg') {
                $image = imagecreatefromjpg($path);
            } elseif ($mime === 'image/jpeg') {
                $image = imagecreatefromjpeg($path);
            } elseif ($mime === 'image/svg') {
                $image = imagecreatefromsvg($path);
            } 

            if ($image) {
                $width = imagesx($image);
                $height = imagesy($image);

                for ($x = 0; $x < $width; $x++) {
                    for ($y = 0; $y < $height; $y++) {
                        $rgba = imagecolorat($image, $x, $y);
                        $alpha = ($rgba & 0x7F000000) >> 24;
                        if ($alpha > 0) {
                            $hasTransparency = true;
                            break 2;
                        }
                    }
                }

                imagedestroy($image);

                if (!$hasTransparency) {
                    return $this->addError('image_id', 'Please upload an image with a transparent background.');
                }
            }
        }
        // Move to final storage
        $finalPath = $imageFile->store('admin_image', 'public');

        $savedImage = Images::create([
            'image_name' => basename($finalPath),
            'image_path' => $finalPath,
            'reference_name' => 'amenities',
            'reference_id' => 0,
        ]);
        Amenity::storeamenities($this->name, $savedImage->id);
        // print_r($savedImage->image_name); die;

        session()->flash('message', 'Amenity created successfully.');
        $this->resetInputFields();
        $this->closeModal();
    }

}
