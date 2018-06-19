@extends('scaffold-interface.layouts.app')
@section('title','Index')
@section('content')

<section class="content">
    <h1>
        Filtro_usuario Index
    </h1>
    <a href='{!!url("filtro_usuario")!!}/create' class = 'btn btn-success'><i class="fa fa-plus"></i> New</a>
    <br>
    <br>
    <table class = "table table-striped table-bordered table-hover" style = 'background:#fff'>
        <thead>
            <th>user_id</th>
            <th>filtro_id</th>
            <th>actions</th>
        </thead>
        <tbody>
            @foreach($filtro_usuarios as $filtro_usuario) 
            <tr>
                <td>{!!$filtro_usuario->user_id!!}</td>
                <td>{!!$filtro_usuario->filtro_id!!}</td>
                <td>
                    <a data-toggle="modal" data-target="#myModal" class = 'delete btn btn-danger btn-xs' data-link = "/filtro_usuario/{!!$filtro_usuario->id!!}/deleteMsg" ><i class = 'fa fa-trash'> delete</i></a>
                    <a href = '#' class = 'viewEdit btn btn-primary btn-xs' data-link = '/filtro_usuario/{!!$filtro_usuario->id!!}/edit'><i class = 'fa fa-edit'> edit</i></a>
                    <a href = '#' class = 'viewShow btn btn-warning btn-xs' data-link = '/filtro_usuario/{!!$filtro_usuario->id!!}'><i class = 'fa fa-eye'> info</i></a>
                </td>
            </tr>
            @endforeach 
        </tbody>
    </table>
    {!! $filtro_usuarios->render() !!}

</section>
@endsection