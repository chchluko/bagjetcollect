<x-app-layout>
    <section class="bg-cover" style="background-image: url({{ asset('img/home/students.jpg') }})">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8 py-36">
            <div class="w-full md:w-3/4 lg:w-1/2">
                <h1 class="text-4xl text-white font-fold">Portal documental {{-- __('Whoops!') --}}</h1>
                <p class="mt-2 mb-4 text-lg text-white">Almacena los documentos digitalizados de los colaboradores PROA</p>

                 {{-- @livewire('search') --}}


            </div>
        </div>
    </section>

    <section class="mt-24">
        <h1 class="mb-6 text-3xl text-center text-gray-600">CONTENIDO</h1>
        <div
            class="grid grid-cols-1 px-4 mx-auto max-w-7xl sm:px-6 lg:px-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
            <article>
                <figure>
                    <img class="object-cover w-full rounded-xl h-36" src="{{ asset('img/home/capacitacion.jpg') }}"
                        alt="">
                </figure>

                <header class="mt-2">
                    <h1 class="text-xl text-center text-gray-700">Capacitacion y desarrollo</h1>
                </header>
                <p class="text-sm text-gray-500">
                    Archivos de capacitacion y desarrollo de los colaboradores, y documentos de apoyo.
                </p>

            </article>
            <article>
                <figure>
                    <img class="object-cover w-full rounded-xl h-36" src="{{ asset('img/home/reclutamiento.jpg') }}"
                        alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-xl text-center text-gray-700">Reclutamiento</h1>
                </header>
                <p class="text-sm text-gray-500">
                    Documentos del colaborador al ingreso a Grupo PROA
                </p>
            </article>
            <article>
                <figure>
                    <img class="object-cover w-full rounded-xl h-36" src="{{ asset('img/home/nomina.jpg') }}"
                        alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-xl text-center text-gray-700">Nomina</h1>
                </header>
                <p class="text-sm text-gray-500">
                    Documentacion referente a la nomina de los colaboradores
                </p>
            </article>
            <article>
                <figure>
                    <img class="object-cover w-full rounded-xl h-36" src="{{ asset('img/home/laborales.jpg') }}"
                        alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-xl text-center text-gray-700">Relaciones Laborales</h1>
                </header>
                <p class="text-sm text-gray-500">
                    Documentacion de Relaciones Laborales de los colaboradores
                </p>
            </article>
        </div>
    </section>

    <section class="py-12 mt-24 bg-gray-700">
        <h1 class="text-3xl text-center text-white">¿Quieres subir un documento o iniciar un expediente?</h1>
        <p class="text-center text-white">Comienza el proceso en el siguiente boton</p>
        <div class="flex justify-center mt-4">
            <a href="{{ route('datosempleado.index') }}"
                class="px-4 py-2 font-semibold text-white bg-green-500 rounded-lg shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-opacity-75">
                Documentar
            </a>
        </div>
    </section>

    <section class="m-2 text-right">
Copyright © {{ date('Y') }} Grupo Diagnostico Médico PROA
    </section>

</x-app-layout>
