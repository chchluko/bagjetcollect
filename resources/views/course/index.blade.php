<x-app-layout>
    <section class="bg-cover" style="background-image: url({{ asset('img/cursos/cursos.jpg') }})">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8 py-36">
            <div class="w-full md:w-3/4 lg:w-1/2">
                <h1 class="text-4xl text-white font-fold">Bienvenido al portal de documentación</h1>
                <p class="mt-2 mb-4 text-lg text-white">Usa las herramientas de busqueda, y filtrado </p>
                @livewire('search')
            </div>
        </div>
    </section>

    @livewire('courses-index')




</x-app-layout>
