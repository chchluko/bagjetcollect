<x-app-layout>
    <div class="container py-8">
        <x-table-responsive>
            <div class="flex px-6 py-4">
                <input wire:keydown='limpiar_page' wire:model='search' type="text" class="flex-1 shadow-sm form-input"
                    placeholder="Ingrese el nombre del documento">

                <a class="ml-2 btn btn-danger" href="{{ route('instructor.courses.create') }}">Crear Nuevo Registro</a>
            </div>
            <hr class="mt-2 mb-6">
            @livewire('expediente.resource', ['documento' => $empleado], key('resources'.$empleado->id))
        </x-table-responsive>
    </div>
</x-app-layout>
