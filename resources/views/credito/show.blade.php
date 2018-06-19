@extends('scaffold-interface.layouts.app')
@section('title','Promocion')
@section('content')

<section class="content">
    <h1>
        Promocion
    </h1>
    <br>
    <a href='{!!url("credito")!!}' class = 'btn btn-primary'><i class="fa fa-home"></i>Credito Index</a>
    <br>
    <table class = 'table table-bordered'>
        
        <tbody>
            <tr>
                <td> <b>Nombre</b> </td>
                <td>{!!$credito->nombre!!}</td>
            </tr>
            <tr>
                <td> <b>Cantidad de Créditos</b> </td>
                <td>{!!$credito->cantidad!!}</td>
            </tr>
            <tr>
                <td> <b>Valor (USD)</b> </td>
                <td>{!!$credito->valor!!}</td>
            </tr>
            <tr>
                <td> <b>Descripción</b> </td>
                <td>{!!$credito->descripcion!!}</td>
            </tr>
        </tbody>
    </table>
</section>
@endsection