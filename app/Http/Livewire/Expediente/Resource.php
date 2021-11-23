<?php

namespace App\Http\Livewire\Expediente;

use App\Models\DocumentType;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Resource extends Component
{
    use WithFileUploads;
    public $documento, $file, $name, $iteration, $type_id;
    public $tipos = [];

    public function mount(DocumentType $documento)
    {
        $this->tipos = DocumentType::get()->pluck('name', 'id')->toArray();
        $this->documento = $documento;
    }

    public function render()
    {
        return view('livewire.expediente.resource');
    }

    public function save()
    {
        $this->validate([
            'file' => 'required|max:200|file|mimes:png,jpg,pdf',
            'name' => 'required',
            'type_id' => 'required',
        ],[
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

        $this->documento = DocumentType::find($this->documento->id);
        $this->resetInput();
    }

    public function download($id)
    {
        $resource = $this->documento->resource->find($id);
        return response()->download(storage_path('app/public/' . $resource->url));
    }

    public function destroy($id)
    {
        $resource = $this->documento->resource->find($id);
        Storage::delete($resource->url);
        $this->documento->resource->find($id)->delete();
        $this->documento = DocumentType::find($this->documento->id);
    }

    private function resetInput()
    {
        $this->type_id = null;
        $this->name = null;
        $this->file = null;
        $this->iteration++;
    }

}
