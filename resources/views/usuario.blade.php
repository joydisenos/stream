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
	    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#fotos" role="tab" aria-controls="fotos" aria-selected="false">Mis Fotos</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" id="creditos-tab" data-toggle="tab" href="#creditos" role="tab" aria-controls="creditos" aria-selected="false">Créditos</a>
	  </li>

	</ul>

	<div class="tab-content" id="myTabContent">
	  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

		<div class="col-md-6">

			
			@foreach($camaras->chunk(3) as $row)
				
				<div class="row">
					@foreach($row as $camara)
					<div class="col">
                  <a href="{{ url('/camara/'. hashid()->encode($camara->id)) }}">
                    
                    <div class="imagen">
                    	<img src="{{asset('storage').'/'.$camara->dato->foto_perfil}}" class="imgcam">
                    </div>
                    <div class="titulo-img">{{ $camara->name }}</div>

                  </a>
                </div>
					@endforeach
				</div>
	
			@endforeach
			



		</div>


	  </div>
	  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

		

		<table class="table table-hover">
			<tr>	
				<td>
					<img src="{{asset('storage').'/'.Auth::user()->dato->foto_perfil}}" class="fotoperfil" alt="Foto de perfil {{Auth::user()->name}}">
				</td>
				<td>
					<a class="btn btn-primary" href="{{url('/dato').'/'.Auth::user()->dato->id}}">Actualizar</a>
				</td>
			</tr>
			<tr>
				<td>Biografía:</td>
				<td>{{Auth::user()->dato->biografia}}</td>
			</tr>
			<tr>
				<td>Año de Nacimiento:</td>
				<td>{{Auth::user()->dato->nacimiento_ano}}</td>
			</tr>
			<tr>
				<td>Sexo:</td>
				<td>{{Auth::user()->dato->sexo}}</td>
			</tr>
			<tr>
				<td>Localidad:</td>
				<td>{{Auth::user()->dato->localidad}}</td>
			</tr>
			<tr>
				<td>Interés:</td>
				<td>{{Auth::user()->dato->interes}}</td>
			</tr>
		</table>
	

	  </div>


		<div class="tab-pane fade" id="fotos" role="tabpanel" aria-labelledby="fotos-tab">

		<div class="row">
			<div class="col">Agregar Fotos</div>
			<div class="col">
				<form action="{{url('foto/guardar')}}" method="post" enctype="multipart/form-data">
				<input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
				<input type="file" name="url" id="url">
				<button class="btn btn-primary" type="submit">Subir</button>
				</form>
			</div>
		</div>
		
		@foreach(Auth::user()->foto->chunk(3) as $row)
				
				<div class="row">
					@foreach($row as $foto)
					<div class="col-md-4">
                  <a href="{{ url('storage').'/'.$foto->url }}">
                    
                    <div class="imagen">
                    	<img src="{{ url('storage').'/'.$foto->url }}" class="imgcam">
                    </div>
                    <div class="titulo-img">{{ $camara->name }}</div>

                  </a>
                </div>
					@endforeach
				</div>
	
			@endforeach


	  </div>


	  <div class="tab-pane fade" id="creditos" role="tabpanel" aria-labelledby="creditos-tab">

		<table class="table table-hover" >
			<tr>
				<td>Créditos Disponibles:</td>
				<td>
					<h2>{{Auth::user()->billetera->disponible}}</h2>
				</td>
			</tr>
			<tr>
				<td><a href="{{url('/comprar')}}" class="btn btn-primary">Comprar Créditos</a></td>
				<td><a href="{{url('/movimientos')}}" class="btn btn-primary">Historial de Movimientos</a></td>
			</tr>
		</table>

	  </div>
	</div>

</div>


@endsection
