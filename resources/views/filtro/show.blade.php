@extends('scaffold-interface.layouts.app')
@section('title','Show')
@section('content')

<section class="content">
    <h1>
        Show filtro
    </h1>
    <br>
    <a href='{!!url("filtro")!!}' class = 'btn btn-primary'><i class="fa fa-home"></i> Lista de Categorías</a>
    <br>
    <table class = 'table table-bordered'>
       
        <tbody>
            <tr>
                <td> <b>Nombre</b> </td>
                <td>{!!$filtro->nombre!!}</td>
            </tr>
        </tbody>
    </table>
</section>
@endsection