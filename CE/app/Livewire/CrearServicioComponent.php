<?php

namespace App\Livewire;

use App\Models\Servicios;
use Livewire\Component;
use Livewire\WithFileUploads;

class CrearServicioComponent extends Component
{
    use WithFileUploads;

    public $open = false;
    public $nombre;
    public $tipo_de_servicio;
    public $contenido;
    public $path;


    public function save()
    {
        
        $this->validate([
            'nombre' => 'required|string|max:255',
            'tipo_de_servicio' => 'required|string|max:255',
            'contenido' => 'required|string|max:255',
            'path' => 'nullable|image|max:1024', 
        ]);
    
       
        $imagePath = null;
        if ($this->path) {
            $imagePath = $this->path->store('servicios', 'public'); 
        }
    
        // Crear el servicio
        Servicios::create([
            'nombre' => $this->nombre,
            'tipo_de_servicio' => $this->tipo_de_servicio,
            'contenido' => $this->contenido,
            'imagen' => $imagePath, 
        ]);
    
       
        $this->dispatch('servicio')->to(ServiciosComponent::class);
        $this->dispatch('alert', '¡El servicio se ha creado exitosamente!');
        $this->reset([
            'open',
            'nombre',
            'tipo_de_servicio',
            'contenido',
            'path',
        ]);
        $this->open = false;
    }
    

    public function render()
    {
        return view('livewire.crear-servicio-component');
    }
}
