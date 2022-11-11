@extends('adminlte::page')
@section('title', 'Panel Admin')

@section('content_header')
<h1 class="ml-2">Añadir Empleado</h1>
@stop

@section('content')
@include('layouts.alerts')
<div class="col-12 mb-5" id="contenedor">
    <form method="POST" action="{{route('empleados.store')}}">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="{{old('nombre')}}">
        </div>
        <div class="form-group">
            <label for="especie">Direccion</label>
            <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Direccion" value="{{old('direccion')}}">
        </div>
        <div class="form-group">
            <label for="edad">Edad</label>
            <input type="text" class="form-control" id="edad" name="edad" placeholder="Edad" value="{{old('edad')}}">
        </div>
        <div class="form-group ">
            <label for="apellido">Apellido</label>
            <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido" value="{{old('apellido')}}">
        </div>
        <div class="form-group">
            <label for="sexo">Sexo</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="sexo" id="sexo" value="M">
                <label class="form-check-label" for="sexo">Masculino</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="sexo" id="sexo" value="H">
                <label class="form-check-label" for="sexo">Femenino</label>
        </div>
        <br><br>
        <div class="text-right">
            <a class="btn btn-primary" href="{{route('empleados.index')}}">Volver al listado</a>
            <button type="submit" class="btn btn-success">Guardar</button>
        </div>
        
        
    </form>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src="{{asset('js/datatable.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js" crossorigin="anonymous"></script>
@stack('scripts')
@stop