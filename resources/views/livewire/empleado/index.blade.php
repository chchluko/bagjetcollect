<div>

    <div class="flex px-6 py-4">
        <input wire:model='search' type="text" class="flex-1 shadow-sm form-input"
            placeholder="Número de nómina, nombre o apellido paterno">
        <div class="flex justify-between m-2">
        <div class="flex items-center cursor-pointer" wire:click="completed">
            @if ($this->status == 0)
            <i class="text-2xl text-blue-600 fas fa-toggle-on"></i>
            @else
            <i class="text-2xl text-gray-600 fas fa-toggle-off"></i>
            @endif
            <p class="ml-2 text-sm">Bajas</p>
        </div>
    </div>
    </div>
    @if ($search)
        @include('empleado.table')
    @else
        @include('empleado.table')
    @endif
</div>
