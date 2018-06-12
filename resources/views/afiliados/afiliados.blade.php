@extends('scaffold-interface.layouts.app')
@section('title','Afiliados')
@section('content')

<section class="content">

@if(count($solicitudes))
<h1>
       Solicitudes
    </h1>
   
    <br>

    <table class = 'table'>
    	<thead>
    		<th>Usuario</th>
    		<th>Email</th>
    		<th>Año de Nacimiento</th>
    		<th>Sexo</th>
    		<th>Localidad</th>
    		<th>Afiliar</th>
    	</thead>    
        <tbody>
            @foreach($solicitudes as $solicitud)
            <tr>
            	<td>{{title_case($solicitud->user->name)}}</td>
            	<td>{{$solicitud->user->email}}</td>
            	<td>{{$solicitud->nacimiento_ano}}</td>
            	<td>{{$solicitud->sexo}}</td>
            	<td>{{$solicitud->localidad}}</td>
            	<td><a href="{{url('afiliar').'/'.$solicitud->id}}" class="btn btn-primary">Afiliar</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>

@endif

    <h1>
       Afiliados
    </h1>
   
    <br>

    <table class = 'table'>
    	<thead>
    		<th>Usuario</th>
    		<th>Email</th>
    		<th>Año de Nacimiento</th>
    		<th>Sexo</th>
    		<th>Localidad</th>
    	</thead>    
        <tbody>
            @foreach($afiliados as $afiliado)
            <tr>
            	<td>{{title_case($afiliado->user->name)}}</td>
            	<td>{{$afiliado->user->email}}</td>
            	<td>{{$afiliado->nacimiento_ano}}</td>
            	<td>{{$afiliado->sexo}}</td>
            	<td>{{$afiliado->localidad}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</section>
@endsection