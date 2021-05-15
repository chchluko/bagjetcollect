<x-app-layout>
    <div class="max-w-4xl py-12 mx-auto sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-500">Detalle del pedido</h1>
        <div class="text-gray-600 card">
            <div class="card-body">
                <article class="flex items-center">
                    <img src="{{ Storage::url($course->image->url) }}" alt="" class="object-cover w-12 h-12">
                    <h1 class="ml-2 text-lg">{{ $course->title }}</h1>
                    <p class="ml-auto text-xl font-bold">US$ {{ $course->price->value }}</p>
                </article>
                <div class="flex justify-end my-2">
                    <a href="{{ route('payment.pay',$course) }}" class="btn btn-primary">Proceder al pago</a>
                </div>

                <hr>
                <p class="mt-4 text-sm">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia voluptates inventore odio eius
                    assumenda quidem! Odit ipsam sunt ullam possimus molestias explicabo quidem excepturi? Laudantium
                    nostrum quod nam ad incidunt.
                    <a href="" class="font-bold text-red-500">Terminos y condiciones</a></p>

            </div>
        </div>
    </div>
</x-app-layout>
