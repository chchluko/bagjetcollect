<section>
    <hi class="text-2xl font-bold">AUDIENCIA DEL CURSO</hi>
    <hr class="mb-6 mt2">

    @foreach ($course->audiences as $item)
    <article class="mb-4 card">
        <div class="bg-gray-100 card-body">

            @if ($audience->id == $item->id)
            <form wire:submit.prevent='update'>
                <input wire:model='audience.name' class="w-full form-input" type="text">
                @error('audience.name')
                <span class="text-xs text-red-500"> {{ $message }}
                </span>
                @enderror
            </form>
            @else
            <header class="flex justify-between">
                <h1>{{ $item->name }}</h1>
                <div>
                    <i wire:click='edit({{ $item }})' class="text-blue-500 cursor-pointer fas fa-edit"></i>
                    <i wire:click='destroy({{ $item }})' class="ml-2 text-red-500 cursor-pointer fas fa-trash"></i>
                </div>
            </header>
            @endif



        </div>
    </article>

    @endforeach

    <article class="card">
        <div class="bg-gray-100 card-body">
            <form wire:submit.prevent='store'>
                <input type="text" class="w-full" wire:model='name' placeholder="Escriba la audiencia del curso">
                @error('name')
                <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
                <div class="flex justify-end mt-2">
                    <button type="submit" class="btn btn-primary">Agregar audiencia</button>
                </div>
            </form>
        </div>
    </article>

</section>
