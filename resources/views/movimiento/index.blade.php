@extends('scaffold-interface.layouts.app')
@section('title','Index')
@section('content')

<section class="content">
    <h1>
        Movimiento Index
    </h1>
    
    <table class = "table table-striped table-bordered table-hover" style = 'background:#fff'>
        <thead>
            <th>Usuario</th>
            <th>Cantidad</th>
            <th>Estado</th>
            <th>Transacción</th>
            <th>Número de transacción</th>
            <th>acciones</th>
        </thead>
        <tbody>
            @foreach($movimientos as $movimiento) 
            <tr>
                <td>{!!$movimiento->user_id!!}</td>
                <td>{!!$movimiento->cantidad!!}</td>
                <td>{!!$movimiento->estado!!}</td>
                <td>{!!$movimiento->transaccion!!}</td>
                <td>{!!$movimiento->numero_trans!!}</td>
                <td>
                    <a data-toggle="modal" data-target="#myModal" class = 'delete btn btn-danger btn-xs' data-link = "/movimiento/{!!$movimiento->id!!}/deleteMsg" ><i class = 'fa fa-trash'> delete</i></a>
                    <a href = '#' class = 'viewEdit btn btn-primary btn-xs' data-link = '/movimiento/{!!$movimiento->id!!}/edit'><i class = 'fa fa-edit'> edit</i></a>
                    <a href = '#' class = 'viewShow btn btn-warning btn-xs' data-link = '/movimiento/{!!$movimiento->id!!}'><i class = 'fa fa-eye'> info</i></a>
                </td>
            </tr>
            @endforeach 
        </tbody>
    </table>
    {!! $movimientos->render() !!}

</section>
@endsection