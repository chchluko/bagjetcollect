@props(['course'])

<article class="flex-col card">

    <img src="{{ Storage::url($course->image->url) }}" alt="" class="object-cover w-full h-36">

    <div class="flex flex-col flex-1 card-body">
        <h1 class="card-title">{{ Str::limit($course->title, 40, '...') }}
        </h1>
        <p class="mt-auto mb-2 text-sm text-gray-500">Prof: {{ $course->teacher->name }}</p>
        <div class="flex">
            <ul class="flex text-sm">
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
            <p class="ml-auto text-sm text-gray-500"><i class="fas fa-users"></i>
                {{ $course->students_count }}</p>
        </div>


@if ($course->price->value == 0)
    <p class="my-2 font-bold text-green-800"> Gratis</p>
    @else
    <p class="my-2 font-bold text-gray-500">US$ {{$course->price->value }}</p>
@endif

        <a href="{{ route('courses.show', $course) }}"
            class="btn btn-primary btn-block">
            Mas información
        </a>
    </div>
</article>
