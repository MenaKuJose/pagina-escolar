<?php

namespace App\Livewire;

use App\Models\Image;
use Livewire\Component;
use Livewire\WithFileUploads;

class CrearImagenesComponente extends Component
{
    use WithFileUploads;

    public $open = false;
    public $title;
    public $description;
    public $path;


    public function save()
    {
        // Validación
        $this->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
            'path' => 'required|image|max:10240', // Cambiado a imagen, max. 10MB
        ]);

        // Asigna el nombre al archivo de la imagen utilizando el título
        $fileName = 'imagen_' . str_replace(' ', '_', preg_replace('/[^\w]/', '_', $this->title)) . '.' . $this->path->extension();

        // Guardar la imagen y crear el registro
        Image::create([
            'title' => $this->title,
            'description' => $this->description,
            'path' => $this->path->storeAs('imagenes', $fileName, 'public'),
        ]);

        // Emitir evento y reiniciar el formulario
        $this->dispatch('imagenes')->to(ImageCrud::class);
        $this->dispatch('alert', '¡La imagen se ha guardado exitosamente!');
        $this->reset([
            'open',
            'title',
            'description',
            'path'
        ]);
        $this->open = false;
    }



    public function render()
    {
        return view('livewire.crear-imagenes-componente');
    }
}
