@extends('adminlte::page')

@section('title', 'Coders')

@section('content_header')
<a href="{{ route('admin.categories.create') }}" class="float-right btn btn-primary btn-sm">Nueva Categoria</a>
<h1>Categorias</h1>
@stop

@section('content')

@if (Session('info'))
    <div class="alert alert-primary">
        {{ session('info') }}
    </div>
@endif


<div class="card">
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td width="10px"><a href="{{ route('admin.categories.edit',$category) }}"
                            class="btn btn-primary btn-sm">Editar</a></td>
                    <td width="10px">
                        <form method="POST" action="{{ route('admin.categories.destroy',$category) }}">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
@stop
