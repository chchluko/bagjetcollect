<x-app-layout>
    <div class="container py-8">
        <x-table-responsive>
            <hr class="mb-6">
            @livewire('empleado.resource', ['documento' => $empleado], key('empleado'.$empleado->NOMINA))
        </x-table-responsive>
    </div>
</x-app-layout>
