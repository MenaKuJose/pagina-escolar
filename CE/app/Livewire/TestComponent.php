<?php

namespace App\Livewire;

use Livewire\Component;

class TestComponent extends Component
{
    public $mensaje;
    public $click = false;

    public function render()
    {
        return view('livewire.test-component');
    }
}
