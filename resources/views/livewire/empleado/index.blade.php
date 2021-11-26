<div>
    <div class="flex px-6 py-4">
        <input wire:model='search' type="text" class="flex-1 shadow-sm form-input"
            placeholder="Número de nómina, nombre o apellido">
    </div>
    @if ($search)
        @include('empleado.table')
    @else
        @include('empleado.table')
    @endif
</div>
