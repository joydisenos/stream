@extends('scaffold-interface.layouts.app')
@section('title','Pagos')
@section('content')

<section class="content">
	 @if(count($pendientes))
    <br>
    <h1>
    	Por Pagar
    </h1>
    <br>
   
   <table class = 'table table-bordered'>
    	<thead>
    		<th>Control</th>
    		<th>Afiliado</th>
    		<th>Cantidad</th>
    		<th>Cliente</th>
    		<th>Acciones</th>

    	</thead>
        
        <tbody>
        @foreach($pendientes as $pendiente)
        
            <tr>
                <td>{!!hashid()->encode($pendiente->id)!!}</td>
                <td>{!!$pendiente->afiliado->name!!}</td>
                <td>{!!$pendiente->creditos!!}</td>
                <td>{!!$pendiente->user->name!!}</td>
                <td>
					<a class="btn btn-primary" href="{{url('pagar').'/'.hashid()->encode($pendiente->id).'/'.'2'}}">Aprobar</a>
                    <a class="btn btn-primary" href="{{url('pagar').'/'.hashid()->encode($pendiente->id).'/'.'0'}}">Denegar</a>
                </td>
            </tr>
        
        @endforeach
        </tbody>
    </table>
    @endif
<br>
    <h1>
        Pagos
    </h1>
    <br>
    <input type="text" class="form-control" id="filtro">
    <table class = 'table table-bordered' id="registros">
    	<thead>
    		<th>Control</th>
    		<th>Afiliado</th>
    		<th>Cantidad</th>
    		<th>Cliente</th>
    		<th>Estatus</th>

    	</thead>
        
        <tbody>
        @foreach($pagos as $pago)
        
            <tr>
                <td>{!!hashid()->encode($pago->id)!!}</td>
                <td>{!!$pago->afiliado->name!!}</td>
                <td>{!!$pago->creditos!!}</td>
                <td>{!!$pago->user->name!!}</td>
                <td>
					@if($pago->estatus == 2)
					Pagado
					@elseif($pago->estatus == 0)
					Negado
					@endif
                </td>
            </tr>
        
        @endforeach
        </tbody>
    </table>
</section>
@endsection