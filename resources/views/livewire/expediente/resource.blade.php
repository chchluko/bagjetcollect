<div class="card" x-data="{open: false}">
    <div class="bg-gray-100 card-body">
        <header>
            <h1 class="font-bold cursor-pointer" x-on:click="open = !open">Archivos</h1>
        </header>
        <div x-show="open">
            <hr class="my-2">
            @if ($documento->resource->count() > 0)

            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                            Nombre
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                            Tipo
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                            Descargar
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                            Eliminar
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">

                    @foreach ($documento->resource as $resource)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="text-sm text-gray-900">{{ $resource->name }}</div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex text-sm text-gray-900 item-center">{{ $resource->tipo->name }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex text-sm text-gray-900 item-center">
                                        <p class="">
                                            <i class="mr-2 text-gray-900 cursor-pointer fas fa-download"
                                            wire:click='download({{ $resource->id }})'></i>
                                        </p>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                            <div class="flex text-sm text-gray-900 item-center">
                                <i class="cursor-pointer fas fa-trash" wire:click='destroy({{ $resource->id }})'></i>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    <!-- More people... -->
                </tbody>
            </table>
            @endif
        </div>
    </div>

    <div class="container py-8">
        <div class="card">
            <div class="card-body">
                <h1 class="font-bold">Agregar documento al Expediente</h1>
                <hr class="mt-2 mb-6">
                <form wire:submit.prevent='save'>
                    <div class="flex mt-4 itmes-center">
                        <label class="w-32">{{ __("Nombre: ") }}</label>
                        <input type="text" name="name" ,
                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            wire:model='name' />
                    </div>
                    @error('name')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror

                    <div class="flex mt-4 itmes-center">
                        <label for="type_id" class="w-32">{{ __("Tipo: ") }}</label>
                        <select
                            wire:model="type_id"
                            id="type_id"
                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm {{ ($errors->has('type_id') ? ' is-invalid' : null) }}">
                            <option value="">{{ __("Selecciona un Tipo") }}</option>
                            @if(count($tipos) > 0)
                                @foreach ($tipos as $id => $name)
                                    <option value="{{ $id }}">{{ $name }}</option>
                                @endforeach
                            @endif
                        </select>
                        @error("type_id")
                        <div class="invalid-feedback">{{ $errors->first("type_id") }}</div>
                        @enderror
                    </div>
                    @error('type_id')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror

                    <div class="flex mt-4 itmes-center">
                        <input type="file" wire:model='file' name="file" id="file{{ $iteration }}"
                        class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                    <div class="mt-1 font-bold text-blue-500" wire:loading wire:target='file'>
                        Cargando...
                    </div>
                    @error('file')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror

                    <div class="flex mt-4 itmes-center">
                        <button type="submit" class="px-4 py-2 mt-1 text-white bg-blue-500 rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:shadow-outline">
                            {{ __("Guardar") }}
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>

</div>
