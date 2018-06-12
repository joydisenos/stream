@extends('scaffold-interface.layouts.app')
@section('title','Citas')
@section('content')

<section class="content">

    <h1>
       Citas
    </h1>
   
    <br>

    <table class = 'table'>
    	<thead>
    		<th>Afiliado</th>
    		<th>Email usuario</th>
    		<th>Detalles</th>
    	</thead>    
        <tbody>
            @foreach($citas as $cita)
            <tr>
            	<td>{{title_case($cita->user->name)}}</td>
            	<td>{{$cita->email}}</td>
            	<td>{{$cita->detalles}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</section>
@endsection