@extends('layouts.front')

@section('titulo')

Zona de Usuarios

@endsection

@section('content')

<div class="container">
	<ul class="nav nav-tabs" id="myTab" role="tablist">

	  <li class="nav-item">
	    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Top Camaras</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Perfil</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" id="creditos-tab" data-toggle="tab" href="#creditos" role="tab" aria-controls="creditos" aria-selected="false">Créditos</a>
	  </li>

	</ul>

	<div class="tab-content" id="myTabContent">
	  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

		<div class="col-md-6">

			<div class="row">
				<div class="col">
				<div class="imagen"></div>
			</div>
			<div class="col">
				<div class="imagen"></div>
			</div>
			<div class="col">
				<div class="imagen"></div>
			</div>
			</div>
			<div class="row">
				<div class="col">
				<div class="imagen"></div>
			</div>
			<div class="col">
				<div class="imagen"></div>
			</div>
			<div class="col">
				<div class="imagen"></div>
			</div>
			</div>
			<div class="row">
				<div class="col">
				<div class="imagen"></div>
			</div>
			<div class="col">
				<div class="imagen"></div>
			</div>
			<div class="col">
				<div class="imagen"></div>
			</div>
			</div>

		</div>


	  </div>
	  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

		

		<table class="table table-hover">
			<tr>	
				<td></td>
				<td>
					<a class="btn btn-primary" href="{{url('/dato').'/'.$datos->id}}">Actualizar</a>
				</td>
			</tr>
			<tr>
				<td>Biografía:</td>
				<td>{{$datos->biografia}}</td>
			</tr>
			<tr>
				<td>Año de Nacimiento:</td>
				<td>{{$datos->nacimiento_ano}}</td>
			</tr>
			<tr>
				<td>Sexo:</td>
				<td>{{$datos->sexo}}</td>
			</tr>
			<tr>
				<td>Localidad:</td>
				<td>{{$datos->localidad}}</td>
			</tr>
			<tr>
				<td>Interés:</td>
				<td>{{$datos->interes}}</td>
			</tr>
		</table>
	

	  </div>
	  <div class="tab-pane fade" id="creditos" role="tabpanel" aria-labelledby="creditos-tab">

		<table class="table table-hover" >
			<tr>
				<td>Créditos Disponibles:</td>
				<td>
					<h2>0</h2>
				</td>
			</tr>
			<tr>
				<td><a href="" class="btn btn-primary">Comprar Créditos</a></td>
				<td><a href="" class="btn btn-primary">Historial de Movimientos</a></td>
			</tr>
		</table>

	  </div>
	</div>

</div>


@endsection
