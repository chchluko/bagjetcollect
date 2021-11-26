<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\EmployeeData;

class ConfirmAlert extends Component
{
    public $contactId;

    public function render()
    {
        return view('livewire.confirm-alert');
    }

    public function destroy($contactId)
    {
        $resource = $this->documento->resource->find($contactId);
        Storage::delete($resource->url);
        $this->documento->resource->find($contactId)->delete();
        $this->documento = EmployeeData::find($this->documento->NOMINA);
    }
}
