<?php

namespace App\Http\Livewire\Empleado;

use Livewire\Component;
use App\Models\DocumentType;
use App\Models\EmployeeData;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Symfony\Component\VarDumper\Cloner\Data;

class Resource extends Component
{
    use WithFileUploads;
    use LivewireAlert;
    public $documento, $file, $name, $iteration, $type_id;
    public $tipos = [];
    protected $listeners = [
        'confirmed'
    ];

    public function mount(EmployeeData $documento)
    {
        $categorias = auth()->user()->getPermissionsViaRoles()->pluck('id');
        $this->tipos = DocumentType::whereIn('permission_id', $categorias)->get()->pluck('name', 'id')->toArray();
        $this->documento = $documento;
    }

    public function render()
    {
        return view('livewire.empleado.resource');
    }

    public function save()
    {
        $this->validate([
            'file' => 'required|max:200|file|mimes:png,jpg,pdf',
            'name' => 'required',
            'type_id' => 'required',
        ], [
            'name.required' => 'Debe llenar el Nombre',
            'type_id.required' => 'Seleccione un Tipo',
            'file.required' => 'Seleccione un Archivo',
            'file.mimes' => 'El Archivo debe ser de tipo png, jpg, pdf',
            'file.max' => 'El Archivo no debe pesar mas de 200KB',
        ]);

        $url = $this->file->store('resources');

        $this->documento->resource()->create([
            'url' => $url,
            'name' => $this->name,
            'type_id' => $this->type_id,
        ]);

        $this->documento = EmployeeData::find($this->documento->NOMINA);
        $this->alert('success', 'Archivo subido correctamente!');
        $this->resetInput();
    }

    public function download($id)
    {
        $resource = $this->documento->resource->find($id);
        return response()->download(storage_path('app/public/' . $resource->url));
    }

    public function submit($id)
    {
        $this->alert('warning', 'Estas Seguro?', [
            'position' => 'center',
            'timer' => null,
            'toast' => false,
            'timerProgressBar' => false,
            'text' => 'Realmente deseas borrar este archivo.',
            'showConfirmButton' => true,
            'onConfirmed' => 'confirmed',
            'showCancelButton' => true,
            'onDismissed' => '',
            'data'  => [
                'id' => $id
            ],
            'cancelButtonText' => 'No',
            'confirmButtonText' => 'Si',
            'allowOutsideClick' => false,
        ]);
    }

    public function confirmed($data)
    {
        $id = $data['data']['id'];
        $resource = $this->documento->resource->find($id);
        Storage::delete($resource->url);
        $this->documento->resource->find($id)->delete();
        $this->documento = EmployeeData::find($this->documento->NOMINA);
    }

    /*public function destroy($id)
    {
        $resource = $this->documento->resource->find($id);
        Storage::delete($resource->url);
        $this->documento->resource->find($id)->delete();
        $this->documento = EmployeeData::find($this->documento->NOMINA);
    }*/

    private function resetInput()
    {
        $this->type_id = null;
        $this->name = null;
        $this->file = null;
        $this->iteration++;
    }
}
