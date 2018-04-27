@extends('scaffold-interface.layouts.app')
@section('title','Index')
@section('content')

<section class="content">
    <h1>
        Datos usuarios
    </h1>
    
    <table class = "table table-striped table-bordered table-hover" style = 'background:#fff'>
        <thead>
            <th>user_id</th>
            <th>biografia</th>
            <th>nacimiento_ano</th>
            <th>sexo</th>
            <th>localidad</th>
            <th>interes</th>
            <th>actions</th>
        </thead>
        <tbody>
            @foreach($datos as $dato) 
            <tr>
                <td>{!!$dato->user_id!!}</td>
                <td>{!!$dato->biografia!!}</td>
                <td>{!!$dato->nacimiento_ano!!}</td>
                <td>{!!$dato->sexo!!}</td>
                <td>{!!$dato->localidad!!}</td>
                <td>{!!$dato->interes!!}</td>
                <td>
                    <a data-toggle="modal" data-target="#myModal" class = 'delete btn btn-danger btn-xs' data-link = "/dato/{!!$dato->id!!}/deleteMsg" ><i class = 'fa fa-trash'> delete</i></a>
                    <a href = '#' class = 'viewEdit btn btn-primary btn-xs' data-link = '/dato/{!!$dato->id!!}/edit'><i class = 'fa fa-edit'> edit</i></a>
                    <a href = '#' class = 'viewShow btn btn-warning btn-xs' data-link = '/dato/{!!$dato->id!!}'><i class = 'fa fa-eye'> info</i></a>
                </td>
            </tr>
            @endforeach 
        </tbody>
    </table>
    {!! $datos->render() !!}

</section>
@endsection