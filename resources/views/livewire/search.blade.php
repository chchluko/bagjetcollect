<form class="relative pt-2 mx-auto text-gray-600" autocomplete="off">
    <input wire:model="search"
        class="w-full h-10 px-5 pr-16 text-sm bg-white border-2 border-gray-300 rounded-lg focus:outline-none"
        type="search" name="search" placeholder="Colaborador a buscar">

    <!-- Repeating these classes for every button can be painful -->
    <button type="submit" class="absolute top-0 right-0 px-4 py-2 mt-2 font-semibold text-white bg-green-500 rounded-lg shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-opacity-75">
        Buscar...
    </button>
    @if ($search)
        <ul class="absolute left-0 z-50 w-full mt-1 overflow-hidden bg-white rounded-lg">
            @forelse ($this->results as $result)
                <li class="px-5 text-sm leading-10 cursor-pointer hover:bg-gray-300">
                    <a href="{{ route('courses.show', $result) }}">{{ $result->title }}</a>
                </li>
            @empty
                <li class="px-5 text-sm leading-10 cursor-pointer hover:bg-gray-300">
                    No hay Resultados que coincidan
                </li>
            @endforelse
        </ul>
    @endif

</form>
