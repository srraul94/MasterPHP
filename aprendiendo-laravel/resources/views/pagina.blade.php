@extends('layouts.master')

@section('titulo','Prueba de plantilla maestra')

@section('header')
    @parent <h2>Hola amigo</h2>
@stop

@section('content')
<h1>Contenido de la página genérica</h1>
@stop