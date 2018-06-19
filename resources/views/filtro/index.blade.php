@extends('scaffold-interface.layouts.app')
@section('title','Index')
@section('content')

<section class="content">
    <h1>
        Categorias
    </h1>
    <a href='{!!url("filtro")!!}/create' class = 'btn btn-success'><i class="fa fa-plus"></i> Agregar</a>
    <br>
    <br>
    <table class = "table table-striped table-bordered table-hover" style = 'background:#fff'>
        <thead>
            <th>Nombre</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            @foreach($filtros as $filtro) 
            <tr>
                <td>{!!$filtro->nombre!!}</td>
                <td>
                    <a class = 'delete btn btn-danger btn-xs' href="{{url('filtro/'.$filtro->id.'/borrar')}}" ><i class = 'fa fa-trash'> Borrar</i></a>
                    <a href = '#' class = 'viewEdit btn btn-primary btn-xs' data-link = '/filtro/{!!$filtro->id!!}/edit'><i class = 'fa fa-edit'> Editar</i></a>
                    
                </td>
            </tr>
            @endforeach 
        </tbody>
    </table>
    {!! $filtros->render() !!}

</section>
@endsection