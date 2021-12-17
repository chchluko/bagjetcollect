<div class="flex mt-4 itmes-center">
    <label for="category_id" class="w-32 my-2"><i class="fas fa-tags text-xs mr-2"></i>{{ __("Categoria: ") }}</label>
    <select wire:model="category_id" id="category_id"
        class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm {{ ($errors->has('category_id') ? ' is-invalid' : null) }}">
        <option value="">{{ __("Selecciona una categoria") }}</option>
        @if(count($categorias) > 0)
        @foreach ($categorias as $id => $name)
        <option value="{{ $id }}">{{ $name }}</option>
        @endforeach
        @endif
    </select>
    @error("category_id")
    <div class="invalid-feedback">{{ $errors->first("category_id") }}</div>
    @enderror
</div>
