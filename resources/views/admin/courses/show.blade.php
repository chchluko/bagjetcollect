<x-app-layout>
    <section class="py-12 mb-12 bg-gray-700">
        <div class="container grid grid-cols-1 gap-6 lg:grid-cols-2">
            <figure>
                @if ($course->image)
                <img class="object-cover w-full h-60" src="{{ Storage::url($course->image->url) }}" all="">
                @else
                <img class="object-cover w-full h-60"
                    src="https://images.pexels.com/photos/733857/pexels-photo-733857.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                    all="">
                @endif

            </figure>
            <div class="text-white">
                <h1 class="text-4xl">{{ $course->title }}</h1>
                <h2 class="mb-3 text-xl">{{ $course->subtitle }}</h2>
                <p class="mb-2"><i class="fas fa-chart-line"></i> Nivel: {{ $course->level->name }}</p>
                <p class="mb-2"><i class="fas fa-bars"></i> Categoria: {{ $course->category->name }}</p>
                <p class="mb-2"><i class="fas fa-users"></i> Matriculasdos: {{ $course->students_count }}</p>
                <p><i class="fas fa-star"></i> Calificación: {{ $course->rating }}</p>
            </div>
        </div>
    </section>

    <div class="container grid grid-cols-1 gap-6 lg:grid-cols-3">

        @if (session('info'))
        <div class="lg:col-span-3" x-data="{open: true}" x-show="open">
             <div class="relative px-4 py-3 text-red-700 bg-red-100 border border-red-400 rounded" role="alert">
                <strong class="font-bold">Ocurrio un error!</strong>
                <span class="block sm:inline">{{ session('info') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                  <svg x-on:click="open=false" class="w-6 h-6 text-red-500 fill-current" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                </span>
            </div>
        </div>
        @else

        @endif


        <div class="order-2 lg:col-span-2 lg:order-1">
            <section class="mb-12 card">
                <div class="card-body">
                    <h1 class="mb-2 text-2xl font-bold">Lo que aprenderás</h1>
                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-2">


                        @forelse ($course->goals as $goal)
                        <li class="text-base text-gray-700"> <i class="mr-2 text-gray-600 fas fa-check"></i>
                            {{ $goal->name }}</li>
                        @empty
                        <li class="text-base text-gray-700">Este curso no tiene metas asignadas</li>
                        @endforelse

                    </ul>
                </div>
            </section>

            <section class="mb-12">
                <h1 class="mb-2 text-3xl font-bold">Temario</h1>
                @forelse ($course->sections as $section)
                <article class="mb-4 shadow" @if ($loop->first) x-data="{ open: true }"
                    @else
                    x-data="{ open: false }" @endif>
                    <header class="px-4 py-2 bg-gray-200 border border-gray-200 cursor-pointer"
                        x-on:click="open = !open">
                        <h1 class="text-lg font-bold text-gray-600">{{ $section->name }}</h1>
                    </header>
                    <div class="px-4 py-2 bg-white" x-show="open">
                        <ul class="grid grid-cols-1 gap-2">
                            @forelse ($section->lessons as $lesson)
                            <li class="text-base text-gray-700"><i class="mr-2 text-gray-600 fas fa-play-circle"></i>
                                {{ $lesson->name }}
                            </li>
                            @empty
                            <li class="text-base text-gray-700">Esta seccion no tiene lecciones
                            </li>
                            @endforelse
                        </ul>
                    </div>
                </article>

                @empty
                <article class="card">
                    <div class="card-body">
                        Este curso no tiene ninguna seccion asignada
                    </div>
                </article>
                @endforelse


            </section>

            <section class="mb-8">
                <h1 class="text-3xl font-bold">Requisitos</h1>
                <ul class="list-disc list-inside">
                    @forelse ($course->requirements as $requirement)
                    <li class="text-base text-gray-700">{{ $requirement->name }}</li>
                    @empty
                    <li class="text-base text-gray-700">Este curso no tiene ningun requerimiento</li>

                    @endforelse
                </ul>
            </section>

            <section>
                <h1 class="text-3xl font-bold">Descripción</h1>
                <div class="text-base text-gray-700">
                    {!! $course->description !!}
                </div>
            </section>

        </div>
        <div class="order-1 lg:order-2">
            <section class="mb-4 card">
                <div class="card-body">
                    <div class="flex items-center">
                        <img class="object-cover w-12 h-12 rounded-full shadow-lg"
                            src="{{ $course->teacher->profile_photo_url }}" all="{{ $course->teacher->name }}">
                        <div class="ml-4">
                            <h1 class="text-lg font-bold text-gray-500">Prof. {{ $course->teacher->name }}</h1>
                            <a class="text-sm font-bold text-blue-400"
                                href="">{{ '@' . Str::slug($course->teacher->name, '') }}</a>
                        </div>
                    </div>

                    <form class="mt-4" action="{{ route('admin.courses.approved',$course) }}" method="POST">
                        @csrf
                        <button type="submit" class="w-full btn btn-primary">Aprobar este curso</button>
                    </form>

                    <a href="{{ route('admin.courses.observation',$course) }}" class="block w-full mt-4 text-center btn btn-danger">Observar Curso</a>
                </div>
            </section>


        </div>
    </div>

</x-app-layout>
