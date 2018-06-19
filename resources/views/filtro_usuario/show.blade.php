@extends('scaffold-interface.layouts.app')
@section('title','Show')
@section('content')

<section class="content">
    <h1>
        Show filtro_usuario
    </h1>
    <br>
    <a href='{!!url("filtro_usuario")!!}' class = 'btn btn-primary'><i class="fa fa-home"></i>Filtro_usuario Index</a>
    <br>
    <table class = 'table table-bordered'>
        <thead>
            <th>Key</th>
            <th>Value</th>
        </thead>
        <tbody>
            <tr>
                <td> <b>user_id</b> </td>
                <td>{!!$filtro_usuario->user_id!!}</td>
            </tr>
            <tr>
                <td> <b>filtro_id</b> </td>
                <td>{!!$filtro_usuario->filtro_id!!}</td>
            </tr>
        </tbody>
    </table>
</section>
@endsection