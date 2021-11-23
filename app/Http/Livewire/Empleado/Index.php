<?php

namespace App\Http\Livewire\Empleado;

use Livewire\Component;
use App\Models\EmployeeData;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $search;

    public function render()
    {
        return view('livewire.empleado.index');
    }

    public function getResultsProperty()
    {
        if($this->search) {
            return EmployeeData::select('NOMINA','NOMBRE','APELLIDOPATERNO','APELLIDOMATERNO')->
            where('NOMINA', 'like', '%'.$this->search.'%')
                ->orWhere('NOMBRE', 'like', '%'.$this->search.'%')
                ->orWhere('APELLIDOPATERNO', 'like', '%'.$this->search.'%')
               ->active()
               ->paginate(15);
        }else{
            return EmployeeData::select('NOMINA','NOMBRE','APELLIDOPATERNO','APELLIDOMATERNO')->active()->orderBy('NOMINA','DESC')->paginate(15);
        }
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
