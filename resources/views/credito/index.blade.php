@extends('scaffold-interface.layouts.app')
@section('title','Promociones')
@section('content')

<section class="content">
    <h1>
        Promociones
    </h1>
    <a href='{!!url("credito")!!}/create' class = 'btn btn-success'><i class="fa fa-plus"></i> Nueva Promoción</a>
    <br>
    <br>

    <input type="text" class="form-control" id="filtro">
    <table class = "table table-striped table-bordered table-hover" style = 'background:#fff' id="registros">
        <thead>
            <th>Nombre</th>
            <th>Cantidad de Créditos</th>
            <th>Valor (USD)</th>
            <th>Descripción</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            @foreach($creditos as $credito) 
            <tr>
                <td>{!!$credito->nombre!!}</td>
                <td>{!!$credito->cantidad!!}</td>
                <td>{!!$credito->valor!!}</td>
                <td>{!!$credito->descripcion!!}</td>
                <td>
                    <a data-toggle="modal" data-target="#myModal" class = 'delete btn btn-danger btn-xs' data-link = "/credito/{!!$credito->id!!}/deleteMsg" ><i class = 'fa fa-trash'> Borrar</i></a>
                    <a href = '#' class = 'viewEdit btn btn-primary btn-xs' data-link = '/credito/{!!$credito->id!!}/edit'><i class = 'fa fa-edit'> Editar</i></a>
                    <a href = '#' class = 'viewShow btn btn-warning btn-xs' data-link = '/credito/{!!$credito->id!!}'><i class = 'fa fa-eye'> Ver</i></a>
                </td>
            </tr>
            @endforeach 
        </tbody>
    </table>
    {!! $creditos->render() !!}

</section>
@endsection