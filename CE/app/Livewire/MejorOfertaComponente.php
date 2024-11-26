<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\MejorOfertaEducativa;
use App\Models\OfertaEducativa;

class MejorOfertaComponente extends Component
{
    public $open = false; // Para abrir o cerrar el modal
    public $oferta_educativa_id;
    public $etapa_inicial;
    public $etapa_continuidad;

    // Reglas de validación del formulario
    protected $rules = [
        'oferta_educativa_id' => 'required|exists:ofertas_educativas,id',
        'etapa_inicial' => 'required|string|max:255',
        'etapa_continuidad' => 'required|string|max:255',
    ];

    // Escuchar el evento 'mejorOfertaGuardada' para actualizar la vista
    protected $listeners = ['mejorOfertaGuardada' => 'render'];

    // Método para guardar la MejorOfertaEducativa
    public function guardar()
    {
        // Validar los datos
        $this->validate();

        // Guardar la nueva mejor oferta educativa
        MejorOfertaEducativa::create([
            'oferta_educativa_id' => $this->oferta_educativa_id,
            'etapa_inicial' => $this->etapa_inicial,
            'etapa_continuidad' => $this->etapa_continuidad,
        ]);

        // Emitir el evento de que la mejor oferta fue guardada
        $this->dispatch('mejorOfertaGuardada');

        // Reiniciar los campos
        $this->reset(['oferta_educativa_id', 'etapa_inicial', 'etapa_continuidad']);

        // Cerrar el modal
        $this->open = false;
    }

    // Método para renderizar el componente con paginación
    public function render()
    {
        return view('livewire.mejor-oferta-componente', [
            'mejoresOfertas' => MejorOfertaEducativa::with('ofertaEducativa')
                ->paginate(10), // Paginación, muestra 10 registros por página
        ]);
    }

    public function index()
    {
        $ofertas = MejorOfertaEducativa::with('ofertaEducativa')->get();

        return response()->json([
            'ofertas' => $ofertas->map(function ($oferta) {
                return [
                    'id' => $oferta->id,
                    'etapa_inicial' => $oferta->etapa_inicial,
                    'etapa_continuidad' => $oferta->etapa_continuidad,
                    // Verifica si la relación existe y solo entonces la devuelves
                    'oferta_educativa' => $oferta->ofertaEducativa ? $oferta->ofertaEducativa->only(['id', 'nombre']) : null,
                ];
            }),
            'status' => 200,
        ]);
    }
}
