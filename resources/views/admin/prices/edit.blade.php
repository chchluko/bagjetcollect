@extends('adminlte::page')

@section('title', 'Coders')

@section('content_header')
    <h1>Editar Precio</h1>
@stop

@section('content')

@if (Session('info'))
    <div class="alert alert-primary">
        {{ session('info') }}
    </div>
@endif


<div class="card">
    <div class="card-body">
        {!! Form::model($price,['route'=>['admin.categories.update',$price],'method'=>'PUT']) !!}

        <div class="form-group">
            {!! Form::label('name', 'Nombre') !!}
            {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'ingrese el nombre de la categoria'])
            !!}
            @error('name')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('value', 'Precio') !!}
            {!! Form::text('value', null, ['class'=>'form-control','placeholder'=>'ingrese el precio'])
            !!}
            @error('value')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        {!! Form::submit('Actualizar Categoria', ['class'=>'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
