<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Servicios;

use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class EditServicioComponent extends Component
{
    use WithFileUploads;

    public $open = false;
    public $servicio;
    public $nombre, $tipo_de_servicio,
        $contenido;
   

    public function mount(Servicios $servicio)
    {
        $this->servicio = $servicio;
    }

    protected $rules = [
        'nombre' => 'required',
        'tipo_de_servicio' => 'required',
        'contenido' => 'required',
    ];

    protected $listeners = ['editservicio' => 'loadservicio'];

    public function loadservicio($servicioId)
    {
        $servicio = Servicios::find($servicioId);
        if ($servicio) {
            $this->servicio = $servicio;
            $this->nombre = $servicio->nombre;
            $this->tipo_de_servicio = $servicio->tipo_de_servicio;
            $this->contenido = $servicio->contenido;
 // No asignar el archivo actual
            $this->open = true;
        }
    }




    public function save()
    {
        $this->validate();

        $data = [
            'nombre' => $this->nombre,
            'tipo_de_servicio' => $this->tipo_de_servicio,
            'contenido' => $this->contenido,
        ];

        // Solo manejar el archivo si se ha subido uno nuevo
   
        $this->servicio->update($data);

        // Reiniciar campos y cerrar modal
       
        $this->reset(['open']);
        // Emitir evento para actualizar la tabla
        $this->dispatch('servicioUpdated')->to(ServiciosComponent::class);
        $this->dispatch('alert', '¡La servicio se ha Editado Exitosamente!');
    }


    public function render()
    {
        return view('livewire.edit-servicio-component');
    }
}
