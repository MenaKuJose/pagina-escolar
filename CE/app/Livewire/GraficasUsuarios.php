<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User; // Asegúrate de que el modelo User esté importado

class GraficasUsuarios extends Component
{
    public $totalUsuarios;

    public function mount()
    {
        // Obtén el total de usuarios al iniciar el componente
        $this->totalUsuarios = User::count();
    }

    public function render()
    {
        return view('livewire.graficas-usuarios', [
            'totalUsuarios' => $this->totalUsuarios,
        ]);
    }
}
