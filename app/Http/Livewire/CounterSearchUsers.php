<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Estatus;

class CounterSearchUsers extends Component
{
    public $search = '';
   
    public function render()
    {
        $datos_estatus = Estatus::where('estatus', 'LIKE', '%'.$this->search.'%')->get();
        return view('livewire.counter-search-users', compact('datos_estatus'));
    }
}
