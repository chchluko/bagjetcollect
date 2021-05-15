@extends('adminlte::page')

@section('title', 'Coders')

@section('content_header')
<a href="{{ route('admin.prices.create') }}" class="float-right btn btn-primary btn-sm">Nuevo Precio</a>
<h1>Precios</h1>
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
                    <th>Precio</th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($prices as $price)
                <tr>
                    <td>{{ $price->id }}</td>
                    <td>{{ $price->name }}</td>
                    <td>{{ $price->value }}</td>
                    <td width="10px"><a href="{{ route('admin.prices.edit',$price) }}"
                            class="btn btn-primary btn-sm">Editar</a></td>
                    <td width="10px">
                        <form method="POST" action="{{ route('admin.prices.destroy',$price) }}">
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
