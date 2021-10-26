<div class="container py-8">
    <x-table-responsive>

        <div class="flex px-6 py-4">
            <input wire:keydown='limpiar_page' wire:model='search' type="text" class="flex-1 shadow-sm form-input" placeholder="Ingrese el nombre del documento">

            <a class="ml-2 btn btn-danger" href="{{ route('instructor.courses.create') }}">Crear Nuevo Registro</a>
        </div>

        @if ($courses->count())


        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col"
                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                        Nombre
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                        Matriculados
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                        Calificación
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                        Status
                    </th>
                    <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">

                @foreach ($courses as $course)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 w-10 h-10">
                                @isset($course->image)
                                    <img class="object-cover object-center w-10 h-10 rounded-full" src="{{ Storage::url($course->image->url) }}"
                                    alt="">
                                    @else
                                    <img id="picture"
                                    src="https://images.pexels.com/photos/733857/pexels-photo-733857.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                                    alt="" class="object-cover object-center w-10 h-10 rounded-full">
                                @endisset

                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                    {{ $course->title }}
                                </div>
                                <div class="text-sm text-gray-500">
                                    {{ $course->category->name }}
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">{{ $course->students_count }}</div>
                        <div class="text-sm text-gray-500">Alumnos Matriculados</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex text-sm text-gray-900 item-center">{{ $course->rating }}
                            <ul class="flex ml-2 text-sm">
                                <li class="mr-1"><i
                                        class="fas fa-star text-{{ $course->rating >= 1 ? 'yellow' : 'gray' }}-400"></i>
                                </li>
                                <li class="mr-1"><i
                                        class="fas fa-star text-{{ $course->rating >= 2 ? 'yellow' : 'gray' }}-400"></i>
                                </li>
                                <li class="mr-1"><i
                                        class="fas fa-star text-{{ $course->rating >= 3 ? 'yellow' : 'gray' }}-400"></i>
                                </li>
                                <li class="mr-1"><i
                                        class="fas fa-star text-{{ $course->rating >= 4 ? 'yellow' : 'gray' }}-400"></i>
                                </li>
                                <li class="mr-1"><i
                                        class="fas fa-star text-{{ $course->rating >= 5 ? 'yellow' : 'gray' }}-400"></i>
                                </li>
                            </ul>
                        </div>
                        <div class="text-sm text-gray-500">Valoración del surso</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @switch($course->status)
                        @case(1)
                        <span
                            class="inline-flex px-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 rounded-full">
                            Borrador
                        </span>
                        @break
                        @case(2)
                        <span
                            class="inline-flex px-2 text-xs font-semibold leading-5 text-yellow-800 bg-yellow-100 rounded-full">
                            Revición
                        </span>
                        @break
                        @case(3)
                        <span
                            class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                            Publicado
                        </span>
                        @break
                        @default
                        @endswitch
                    </td>
                    <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                        <a href="{{ route('instructor.courses.edit',$course) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                    </td>
                </tr>
                @endforeach



                <!-- More people... -->
            </tbody>
        </table>
        <div class="px-6 py-4">
            {{ $courses->links() }}
        </div>
@else
        <div class="px-6 py-4">
            No hay ningun registro que coincida
        </div>
        @endif
    </x-table-responsive>
</div>
