<?php

namespace App\Livewire\Admin\Sports;

use App\Models\Sport;
use App\Models\Images;
use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Validator;

class Sports extends Component
{
    use WithFileUploads;

    public $name, $image_id;

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
        $this->name = '';
        $this->image_id = '';
    }
    public function render()
    {
        $sports = Sport::leftJoin('images', 'sports.image_id', '=', 'images.id')
            ->select('sports.*', 'images.image_path')->get();

        return view('livewire.admin.sports.sports', [
            'sports' => $sports
        ])->layout('livewire.admin.component.layouts.app');
    }




    public function addsport(Request $request)
    {
        $this->validate([
            'name' => 'required',
            'image_id' => 'required|image|dimensions:width=150,height=150',
        ], [
            'image_id.dimensions' => 'The image must be exactly 150x150 pixels.',
        ]);

        $file = $this->image_id;
        $path = $file->getRealPath(); 
        $mime = $file->getMimeType();

        $hasTransparency = false;

        if (in_array($mime, ['image/png', 'image/jpg', 'image/webp', 'image/jpeg', 'image/svg'])) {
            $image = null;

            if ($mime === 'image/png') {
                $image = imagecreatefrompng($path);
            } elseif ($mime === 'image/jpg') {
                $image = imagecreatefromjpg($path);
            } elseif ($mime === 'image/jpeg') {
                $image = imagecreatefromjpeg($path);
            } elseif ($mime === 'image/webp') {
                $image = imagecreatefromwebp($path);
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

        // Store image
        $filename = time() . '_' . $file->getClientOriginalName();
        $filepath = $file->storeAs('admin_image', $filename, 'public');

        $image = Images::create([
            'image_name' => $filename,
            'image_path' => $filepath,
            'reference_name' => 'sports',
            'reference_id' => 0,
        ]);

        Sport::create([
            'name' => $this->name,
            'image_id' => $image->id,
        ]);

        session()->flash('message', 'Sport added successfully!');
        $this->reset(['name', 'image_id']);
        $this->closeModal();
    }
    public function sportdelete($id)
    {

        $result = sport::deletesport($id);

        if ($result) {
            session()->flash('message', $result['message']);
        } else {
            session()->flash('message', 'sport not found.');
        }


    }

}
