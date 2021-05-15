<div>

    <h1 class="text-2xl font-bold">LECCIONES DEL CURSO</h1>
    <hr class="mt-2 mb-6">

    @foreach ($course->sections as $item)
    <article class="mb-6 card" x-data="{open: true}">
        <div class="bg-gray-100 card-body">

            @if ($section->id == $item->id)
            <form wire:submit.prevent='update'>
                <input wire:model='section.name' type="text" class="w-full form-input"
                    placeholder="nombre de la seccion">

                @error('section.name')
                <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </form>
            @else
            <header class="flex items-center justify-between">
                <h1 x-on:click="open = !open" class="cursor-pointer"><strong>Seccion:</strong> {{ $item->name }}</h1>
                <div>
                    <i class="text-blue-500 cursor-pointer fas fa-edit" wire:click='edit({{ $item }})'></i>
                    <i class="text-red-500 cursor-pointer fas fa-eraser" wire:click='destroy({{ $item }})'></i>
                </div>
            </header>


            <div x-show="open">
                @livewire('instructor.courses-lesson',['section'=>$item],key($item->id))
            </div>



            @endif

        </div>
    </article>
    @endforeach

    <div x-data="{open:false}">
        <a x-show="!open" x-on:click="open = true" class="flex cursor-pointer item-center">
            <i class="mr-2 text-2xl text-red-500 far fa-plus-square"></i>
            Agregar Nueva seccion
        </a>
        <article class="card" x-show="open">
            <div class="bg-gray-100 card-body">
                <h1 class="mb-4 text-xl font-bold">Agregar nueva sección</h1>
                <div class="mb-4">
                    <input type="text" wire:model='name' class="w-full form-input"
                        placeholder="Escriba el nombre de la seccion">
                    @error('name')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex justify-end">
                    <button class="btn btn-danger" x-on:click="open = false">Cancelar</button>
                    <button class="ml-2 btn btn-primary" wire:click='store'>Agregar</button>
                </div>
            </div>
        </article>
    </div>

</div>
