@extends('scaffold-interface.layouts.app')
@section('title','Index')
@section('content')

<section class="content">
    @if(count($pendientes))
    <h1>
        Movimientos Por Confirmar
    </h1>
    <table class = "table table-striped table-bordered table-hover" style = 'background:#fff'>
        
        <thead>
            <th>Usuario</th>
            <th>Cantidad</th>
            <th>Transacción</th>
            <th>Número de transacción</th>
            <th>Confirmar</th>
        
        </thead>
        @foreach($pendientes as $pendiente)
        <tr>
                <td>{!!$pendiente->user->name!!}</td>
                <td>{!!$pendiente->cantidad!!}</td>
                <td>{!!$pendiente->transaccion!!}</td>
                <td>{!!$pendiente->numero_trans!!}</td>
                <td>
                    <a class="btn btn-primary" href="{{url('abonar').'/'.hashid()->encode($pendiente->id)}}">Abonar</a>
                    <a class="btn btn-primary" href="{{url('negar').'/'.hashid()->encode($pendiente->id)}}">Denegar</a>
                </td>
                
        </tr>
        @endforeach
    </table>

    @endif


    <h1>
        Movimientos Realizados
    </h1>
    <input type="text" class="form-control" id="filtro">

    <table class = "table table-striped table-bordered table-hover" style = 'background:#fff' id="registros">
        <thead>
            <th>Número de Operación</th>
            <th>Usuario</th>
            <th>Cantidad</th>
            <th>Transacción</th>
            <th>Número de transacción</th>
            <th>Estado</th>
        
        </thead>
        <tbody>
            @foreach($movimientos as $movimiento) 
            <tr>
                <td>{!!hashid()->encode($movimiento->id)!!}</td>
                <td>{!!$movimiento->user->name!!}</td>
                <td>{!!$movimiento->cantidad!!}</td>
                <td>{!!$movimiento->transaccion!!}</td>
                <td>{!!$movimiento->numero_trans!!}</td>

            @if($movimiento->estado == 2)
            <td style="color:green">Aprobada </td>
            @elseif($movimiento->estado == 3)
            <td style="color:red">Rechazada</td>
            @endif
                
            </tr>
            @endforeach 
        </tbody>
    </table>
    {!! $movimientos->render() !!}

</section>
@endsection