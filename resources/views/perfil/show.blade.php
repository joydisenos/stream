@extends('scaffold-interface.layouts.app')
@section('title','Show')
@section('content')

<section class="content">
    <h1>
        {{ title_case(Auth::user()->name) }}
    </h1>
    <br>
    <a href='{!!url("perfil/". $usuario->dato->id)!!}' class = 'btn btn-primary'><i class="fa fa-home"></i>Actualizar Perfil</a>
    <br>
    <table class = 'table table-bordered'>
        
        <tbody>
            <tr>
                <td> <b>Usuario</b> </td>
                <td>{{$usuario->name}}</td>
            </tr>
            <tr>
                <td> <b>Biografía</b> </td>
                <td>{{ $usuario->dato->biografia }}</td>
            </tr>
            <tr>
                <td> <b>Año de Nacimiento</b> </td>
                <td>{{ $usuario->dato->nacimiento_ano }}</td>
            </tr>
            <tr>
                <td> <b>Sexo</b> </td>
                <td>{{ $usuario->dato->sexo }}</td>
            </tr>
            <tr>
                <td> <b>Localidad</b> </td>
                <td>{{ $usuario->dato->localidad }}</td>
            </tr>
            <tr>
                <td> <b>Interés</b> </td>
                <td>{{ $usuario->dato->interes }}</td>
            </tr>
        </tbody>
    </table>
</section>
@endsection