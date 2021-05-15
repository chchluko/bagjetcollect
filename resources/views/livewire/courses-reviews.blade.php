<section class="mt-4 mb-2">
    <h1 class="text-3xl font-bold">Valoración</h1>

    @can('enrolled', $course)
    <article class="my-4">
        @can('valored', $course)

        <textarea rows="4" class="w-full form-input" placeholder="Ingrese una reseña" wire:model='comment'></textarea>
        <div class="flex">
            <button class="mr-2 btn btn-primary" wire:click='store'>Guardar</button>
            <ul class="flex items-center">
                <li class="mr-1 cursor-pointer" wire:click="$set('rating',1)"><i
                        class="fas fa-star text-{{ $rating >= 1 ? 'yellow' : 'gray' }}-300"></i>
                </li>
                <li class="mr-1 cursor-pointer" wire:click="$set('rating',2)"><i
                        class="fas fa-star text-{{ $rating >= 2 ? 'yellow' : 'gray' }}-300"></i>
                </li>
                <li class="mr-1 cursor-pointer" wire:click="$set('rating',3)"><i
                        class="fas fa-star text-{{ $rating >= 3 ? 'yellow' : 'gray' }}-300"></i>
                </li>
                <li class="mr-1 cursor-pointer" wire:click="$set('rating',4)"><i
                        class="fas fa-star text-{{ $rating >= 4 ? 'yellow' : 'gray' }}-300"></i>
                </li>
                <li class="mr-1 cursor-pointer" wire:click="$set('rating',5)"><i
                        class="fas fa-star text-{{ $rating >= 5 ? 'yellow' : 'gray' }}-300"></i>
                </li>
            </ul>
        </div>
        @else
        <div class="flex items-center px-4 py-3 text-sm font-bold text-white bg-blue-500" role="alert">
            <svg class="w-4 h-4 mr-2 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
            <p>Usted ya ha valorado este curso.</p>
          </div>
        @endcan
    </article>
    @endcan


    <div class="card">
        <div class="card-body">
            <p class="text-xl text-gray-800">{{ $course->reviews->count() }} Valoraciones</p>

            @foreach ($course->reviews as $review)
            <article class="flex mb-4 text-gray-800">
                <figure class="mr-4">
                    <img src="{{ $review->user->profile_photo_url }}" alt=""
                        class="object-cover w-12 h-12 rounded-full shadow-lg">
                </figure>

                <div class="flex-1 card">
                    <div class="bg-gray-100 card-body">
                        <p class="">
                            <b class="">{{ $review->user->name }}</b>
                            <i class="text-yellow-300 fas fa-star"></i>
                            {{ $review->rating }}
                        </p>
                        {{ $review->comment }}
                    </div>
                </div>
            </article>

            @endforeach

        </div>
    </div>

</section>
