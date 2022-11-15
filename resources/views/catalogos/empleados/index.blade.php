@extends('adminlte::page')
@section('title', 'Panel Admin')

@section('content_header')
<h1 class="ml-2">Empleados</h1>
@stop

@section('content')

<div class="col-12" id="contenedor">
    @include('layouts.alerts')
    <a class="btn btn-primary" href="{{route('empleados.create')}}">Crear</a>
    <div class="table-responsive">
        <table id="table" class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Edad</th>
                <th scope="col">Direccion</th>
                <th scope="col">Sexo</th>
                <th scope="col">Editar</th>
                <th scope="col">Eliminar</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($empleados as $empleado)
              <tr>
                <td>{{$empleado->nombre}}</td>
                <td>{{$empleado->apellido}}</td>
                <td>{{$empleado->edad}}</td>
                <td>{{$empleado->direccion}}</td>
                <td>{{$empleado->sexo}}</td>
                <td><a href="{{route('empleados.edit', $empleado)}}" class="btn btn-warning">Editar</a></td>
                <td>
                    <form action="{{route('empleados.destroy', $empleado->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>
    </div>
    
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