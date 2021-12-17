<?php

namespace App\Http\Livewire\Empleado;

use App\Models\Resource as ResourceModel;
use Livewire\Component;
use App\Models\Category;
use App\Models\DocumentType;
use App\Models\EmployeeData;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Resource extends Component
{
    use WithFileUploads;
    use LivewireAlert;
    public $documento, $file, $name, $iteration, $type_id, $category_id,$defaultname;
    public $tipos = [],$categorias = [],$filtrados = [], $expediente = [];
    protected $listeners = [
        'confirmed'
    ];

    public function mount(EmployeeData $documento)
    {
        $visibles = auth()->user()->getPermissionsViaRoles()->pluck('id');

        $this->categorias =Category::get()->pluck('name', 'id')->toArray();
        $this->tipos = DocumentType::whereIn('permission_id', $visibles)->get()->pluck('name', 'id')->toArray();
        $this->documento = $documento;
        $this->filtrados = DocumentType::whereIn('category_id',[0])->pluck('id');
        $this->expediente = ResourceModel::whereIn('type_id',$this->filtrados)->where('resourceable_id',$this->documento->NOMINA)->get();
    }

    public function render()
    {
        if ($this->category_id != 0){
             $this->filtrados = DocumentType::where('category_id',$this->category_id)->pluck('id');
             $this->expediente = ResourceModel::whereIn('type_id',$this->filtrados)->where('resourceable_id',$this->documento->NOMINA)->get();
         }
        return view('livewire.empleado.resource');
    }

    public function save()
    {
        $this->defaultname = $this->getfilename($this->file->getClientOriginalName());
        $this->validate([
            'file' => 'required|max:200|file|mimes:png,jpg,pdf',
         //   'name' => 'required',
            'type_id' => 'required',
        ], [
          //  'name.required' => 'Debe llenar el Nombre',
            'type_id.required' => 'Seleccione un Tipo',
            'file.required' => 'Seleccione un Archivo',
            'file.mimes' => 'El Archivo debe ser de tipo png, jpg, pdf',
            'file.max' => 'El Archivo no debe pesar mas de 200KB',
        ]);

if ($this->name == null){
    $this->name = $this->defaultname;
}


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

    public function getfilename($fullName)
    {
        return $name=explode('.',$fullName)[0];
    }

    private function resetInput()
    {
        $this->type_id = null;
        $this->name = null;
        $this->file = null;
        $this->iteration++;
    }
}
