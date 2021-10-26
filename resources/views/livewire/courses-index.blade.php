<div>
    <div class="py-4 mb-16 bg-gray-200">
        <div class="flex px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <button class="h-12 px-4 mr-4 text-gray-700 bg-white rounded shadow focus:outline-none"
                wire:click="resetFilters">
                <i class="mr-2 text-xs fas fa-archway"></i>
                Todos Los documentos
            </button>

            <!-- Dropdown -->
            <div class="relative mr-4" x-data="{ open: false }">
                <button
                    class="block h-12 px-4 overflow-hidden text-gray-700 bg-white rounded-lg shadow focus:outline-none"
                    x-on:click="open=true">
                    <i class="mr-2 text-xs fas fa-tags"></i>
                    Categoria
                    <i class="ml-2 text-xs fas fa-angle-down"></i>
                </button>
                <!-- Dropdown Body -->
                <div class="absolute right-0 w-40 py-2 mt-2 bg-white border rounded shadow-xl" x-show="open"
                    x-on:click.away="open=false">
                    @foreach ($categories as $category)
                        <a class="block px-4 py-2 text-gray-900 transition-colors duration-200 rounded cursor-pointer text-normal hover:bg-blue-500 hover:text-white"
                            wire:click="$set('category_id',{{ $category->id }})"
                            x-on:click="open = false">{{ $category->name }}</a>
                    @endforeach


                </div>
                <!-- // Dropdown Body -->
            </div>
            <!-- // Dropdown -->

            <!-- Dropdown -->
            <div class="relative" x-data="{ open: false }">
                <button
                    class="block h-12 px-4 overflow-hidden text-gray-700 bg-white rounded-lg shadow focus:outline-none"
                    x-on:click="open=true">
                    <i class="mr-2 text-xs fas fa-bars"></i>
                    Niveles
                    <i class="ml-2 text-xs fas fa-angle-down"></i>
                </button>
                <!-- Dropdown Body -->
                <div class="absolute right-0 w-40 py-2 mt-2 bg-white border rounded shadow-xl" x-show="open"
                    x-on:click.away="open=false">
                    @foreach ($levels as $level)
                        <a class="block px-4 py-2 text-gray-900 transition-colors duration-200 rounded cursor-pointer text-normal hover:bg-blue-500 hover:text-white"
                            wire:click="$set('level_id',{{ $level->id }})"
                            x-on:click="open = false">{{ $level->name }}</a>
                    @endforeach
                </div>
                <!-- // Dropdown Body -->
            </div>
            <!-- // Dropdown -->

        </div>
    </div>
    <div
        class="grid grid-cols-1 px-4 mx-auto max-w-7xl sm:px-6 lg:px-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">

        @foreach ($courses as $course)
            <x-course-card :course="$course" />
        @endforeach
    </div>
    <div class="px-4 mx-auto my-8 max-w-7xl sm:px-6 lg:px-8">
        {{ $courses->links() }}
    </div>

</div>
