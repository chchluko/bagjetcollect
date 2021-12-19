<?php

namespace App\Http\Livewire\Empleado;

use Livewire\Component;
use App\Models\EmployeeData;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $search,$status;

    public function mount()
    {
        $this->status = '3';
    }

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
               ->active($this->status)
                ->paginate(15);
        }else{
            return EmployeeData::select('NOMINA','NOMBRE','APELLIDOPATERNO','APELLIDOMATERNO')
                    ->active($this->status)
                    ->orderBy('NOMINA','DESC')
                    ->paginate(15);
        }
    }

    public function completed()
    {
        if ($this->status == '3') {
            $this->status = '0';
        } else {
            $this->status = '3';
        }
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
