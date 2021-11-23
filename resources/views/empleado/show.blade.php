<x-app-layout>
    <div class="container py-8">
        <x-table-responsive>
            <hr class="mt-2 mb-6">
            @livewire('empleado.resource', ['documento' => $empleado], key('empleado'.$empleado->NOMINA))
        </x-table-responsive>
    </div>
</x-app-layout>
