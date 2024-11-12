<?php

namespace App\Livewire;

use App\Models\Image;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class EditImagenesModal extends Component
{
    use WithFileUploads;

    public $open = false;
    public $image;
    public $title, $description;
    public $path, $newImage;

    protected $listeners = ['editImage' => 'loadImage'];

    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'nullable|string|max:500',
        'newImage' => 'nullable|image|max:10240', // Máximo 10MB
    ];

    public function loadImage($imageId)
    {
        $image = Image::find($imageId);
        if ($image) {
            $this->image = $image;
            $this->title = $image->title;
            $this->description = $image->description;
            $this->path = $image->path;
            $this->newImage = null; // Limpiar nueva imagen
            $this->open = true;
        }
    }

    public function save()
    {
        $this->validate();

        $data = [
            'title' => $this->title,
            'description' => $this->description,
        ];

        if ($this->newImage instanceof TemporaryUploadedFile) {
            if ($this->image->path) {
                Storage::disk('public')->delete($this->image->path);
            }

            $fileName = 'imagen_' . str_replace(' ', '_', preg_replace('/[^\w]/', '_', $this->title)) . '.' . $this->newImage->extension();
            $data['path'] = $this->newImage->storeAs('imagenes', $fileName, 'public');
        }

        $this->image->update($data);
        $this->reset(['open', 'newImage', 'path']);

        $this->dispatch('imagenesActualizadas')->to(ImageCrud::class);
        $this->dispatch('alert', '¡La imagen se ha editado exitosamente!');
    }

    public function render()
    {
        return view('livewire.edit-imagenes-modal');
    }
}
