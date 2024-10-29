<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class TablaUsersComponent extends Component
{
    public $users;

    public function mount()
    {
        // Obtén todos los usuarios al montar el componente
        $this->users = User::all();
    }

    public function render()
    {
        return view('livewire.tabla-users-component', ['users' => $this->users]);
    }
}
