@extends('adminlte::page')

@section('title', 'Coders')

@section('content_header')
<h1>Asignar Role</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">

        <h1 class="h5">Nombre:</h1>
        <p class="form-control">
            {{ $user->name }}
        </p>

        <h1 class="h5">Lista de Roles:</h1>
        {!! Form::model($user, ['route'=>['admin.users.update',$user], 'method' =>'PUT']) !!}
        @foreach ($roles as $role)
        <div>
            <label>
                {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                {{ $role->name }}
            </label>
        </div>
        @endforeach
        {!! Form::submit('Asignar Role', ['class' => 'btn btn-primary mt-2']) !!}
        {!! Form::close() !!}
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!');

</script>
@stop
