<div>
    <article class="card" x-data="{open: false}">
        <div class="card-body bg-gray-100">
            <header>
                <h1 x-on:click="open = !open" class="cursor-pointer">Descripción de la leccion</h1>
            </header>
            <div x-show="open">
                <hr class="my-2">
                @if ($lesson->description)
                <form wire:submit.prevent='update'>
                    <textarea wire:model="description.name" class="form-input w-full"></textarea>
                    @error('description.name')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                    <div class="flex justify-end">
                        <button type="button" class="text-sm btn btn-danger" wire:click='destroy'>Eliminar</button>
                        <button type="submit" class="text-sm btn btn-primary ml-2">Actualizar</button>
                    </div>
                </form>
                @else
                <div wire:submit.prevent='update'>
                    <textarea wire:model="name" class="form-input w-full" placeholder="Agrege su descripcion aqui"></textarea>
                    @error('description.name')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                    <div class="flex justify-end">
                        <button class="text-sm btn btn-primary ml-2" wire:click='store'>Agregar Descripcion</button>
                    </div>
                </div>

                @endif
            </div>
        </div>

    </article>
</div>
