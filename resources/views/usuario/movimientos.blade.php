@extends('layouts.front')

@section('titulo')

Zona de Usuarios

@endsection

@section('content')
<div class="bg-gray text-center">
        <h3>
        Historial de Movimientos
    </h3>
   </div>
<section class="container">
 
    
    <table class="table table-hover">
    	<thead>
            <th>Número Transacción</th>
    		<th>Cantidad</th>
    		<th>Créditos</th>
    		<th>Estado</th>
    	</thead>
    	@foreach($movimientos as $movimiento)
    	<tr>
            <td>{{hashid()->encode($movimiento->id)}}</td>
    		<td>{{$movimiento->cantidad}}</td>
    		@if($movimiento->transaccion = 'compra')
    		<td class="bg-success" style="color:#ffffff">Abono: Valor Créditos</td>
    		@elseif($movimiento->transaccion = 'gasto')
    		<td class="bg-danger" style="color:#ffffff">Gasto: Cantidad Créditos</td>
    		@endif

            
    		@if($movimiento->estado == 1)
            <td><i class="fas fa-clock"></i> Su solicitud será procesada en breve </td>
            @elseif($movimiento->estado == 2)
            <td style="color:green"><i class="fas fa-check-circle"></i> Operación Aprobada </td>
            @elseif($movimiento->estado == 3)
            <td style="color:red"><i class="fas fa-minus-circle"></i> Su operación fué rechazada</td>
            @endif
    	</tr>
    	@endforeach
    </table>
</section>
@endsection