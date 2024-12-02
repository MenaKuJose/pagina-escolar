<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Servicios;

use Illuminate\Http\Request;
use Livewire\WithFileUploads;

class ServiciosComponent extends Component
{
    use WithFileUploads;
    public $servicios;
    protected $listeners = ['servicio' => 'render', 'servicioUpdated' => 'render', 'deleteServicio' => 'deleteServicio']; // Corregido aquí


    public function mount()
    {
        $this->servicios = Servicios::all();
    }

    public function render()
    {
        $this->servicios = Servicios::all();
        return view('livewire.servicios-component', ['servicios' => $this->servicios]);
    }

    public function index()
    {
        $servicio = Servicios::all();
        $data = [
            'servicios' => $servicio,
            'datos' => 200
        ];
        // Retorna la respuesta en formato JSON
        return response()->json($data, 200);
    }

    public function editservicio($servicioId)
    {
        $this->dispatch('editservicio', $servicioId);
    }

    public function deleteServicio($servicioId)
    {
        // Encuentra el servicio por ID y elimínalo
        $servicio = Servicios::find($servicioId);
        if ($servicio) {
            $servicio->delete();
            // Emitir eventos para actualizar la lista de servicios y mostrar la alerta
            $this->dispatch('servicioUpdated');
            $this->dispatch('alert', '¡El servicio se ha eliminado exitosamente!');
        }
    }
}
