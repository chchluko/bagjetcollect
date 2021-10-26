@extends('adminlte::page')

@section('title', 'Coders')

@section('content_header')
    <h1>Hola {{ auth()->user()->name }}</h1>
@stop

@section('content')
    <p>Bienvenido al panel de Administración.</p>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
