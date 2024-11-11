<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\OfertaEducativa;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;

class OfAdminComponente extends Component
{
    use WithFileUploads;
    public $ofertas;
    protected $listeners = ['ofertas' => 'render', 'ofertaUpdated' => 'render', 'deleteOferta' => 'deleteOferta'];

    public function render()
    {
        // Recarga las ofertas al renderizar para confirmar que se actualizan
        $this->ofertas = OfertaEducativa::all();
        return view('livewire.of-admin-componente', ['ofertas' => $this->ofertas]);
    }

    public function add(Request $request)
    {
        $oferta = OfertaEducativa::create([
            'nombre' => $request->nombre,
            'etapa_inicial' => $request->etapa_inicial,
            'duracion_cuatri_in' => $request->duracion_cuatri_in,
            'etapa_continuidad' => $request->etapa_continuidad,
            'duracion_cuatri_con' => $request->duracion_cuatri_con,
            'horas_totales' => $request->horas_totales,
            'duracion_total_programa' => $request->duracion_total_programa,
            'creditos_totales' => $request->creditos_totales,
            'mapa_curricular' => $request->mapa_curricular, // Puedes dejarlo como null en el request
        ]);

        $data = [
            'oferta' => $oferta,
            'status' => 200
        ];
        return response()->json($data, 200);
    }


    public function editOferta($ofertaId)
    {
        $this->dispatch('editOferta', $ofertaId);
    }

    public function deleteOferta($ofertaId)
    {
        // Encuentra la oferta por ID y elimínala
        $oferta = OfertaEducativa::find($ofertaId);
        if ($oferta) {
            $oferta->delete();
            // Emitir eventos para actualizar la lista de ofertas y mostrar la alerta
            $this->dispatch('ofertaUpdated');
            $this->dispatch('alert', '¡La Oferta se ha eliminado exitosamente!');
        }
    }







    public function index()
    {
        $oferta = OfertaEducativa::all();
        $data = [
            'ofertas' => $oferta,
            'datos' => 200
        ];

        // Retorna la respuesta en formato JSON
        return response()->json($data, 200);
    }
}
