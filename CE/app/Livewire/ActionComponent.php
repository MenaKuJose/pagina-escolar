<?php

namespace App\Livewire;

use Livewire\Component;

class ActionComponent extends Component
{
    public $counter = 100;
    public function add()
    {
        $this->counter -= 1;
    }

    public function render()
    {
        return view('livewire.action-component');
    }
}
