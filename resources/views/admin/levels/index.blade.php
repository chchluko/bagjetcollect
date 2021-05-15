@extends('adminlte::page')

@section('title', 'Coders')

@section('content_header')
<a href="{{ route('admin.levels.create') }}" class="float-right btn btn-primary btn-sm">Nueva Nivel</a>
<h1>Niveles</h1>
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
                @foreach ($levels as $level)
                <tr>
                    <td>{{ $level->id }}</td>
                    <td>{{ $level->name }}</td>
                    <td width="10px"><a href="{{ route('admin.levels.edit',$level) }}"
                            class="btn btn-primary btn-sm">Editar</a></td>
                    <td width="10px">
                        <form method="POST" action="{{ route('admin.levels.destroy',$level) }}">
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
