@extends('layouts.frontui')

@section('titulo')

Zona de Usuarios

@endsection

@section('content')

<div class="row">
    <div class="col s12 blue-text" style="margin:5px auto;">
      <ul class="tabs">
        <li class="tab col s3"><a href="#topcamaras">Top Camaras</a></li>
        <li class="tab col s3"><a class="active" href="#perfil">Perfil</a></li>
        <li class="tab col s3"><a href="#fotos">Mis Fotos</a></li>
        <li class="tab col s3"><a href="#creditos">Créditos</a></li>
      </ul>
    </div>
    <div id="topcamaras" class="col s12">

	
			<div class="text-center">
				<h6>Cámaras en vivo conectadas</h6>
			</div>

			
				@foreach ($camaras->chunk(3) as $row)
          <div class="row">
            @foreach ($row as $camara)
                <div class="col m4 center-align">
                  <a href="{{ url('/camara/'. hashid()->encode($camara->user->id)) }}">
                    
                    <div class="camarawrap">

                    <div class="imagen">
                      <img src="{{asset('storage').'/'.$camara->foto_perfil}}" class="imgcam responsive-img">

                      	<div class="valign-wrapper hover-name">	
								
								<h4 class="center-align">{{title_case($camara->user->name)}}</h4>
						
                    	</div>
                    </div>

                   
                   
                    </div>

                  </a>
                </div>
            @endforeach
          </div>
        @endforeach

    </div>
    <div id="perfil" class="col s12">

	<table class="table">
			<tr>	
				<td>
					<img src="{{asset('storage').'/'.Auth::user()->dato->foto_perfil}}" class="fotoperfil" width="200" alt="Foto de perfil {{Auth::user()->name}}">
				</td>
				<td>
					<a class="btn waves-effect waves-light red" href="{{url('/dato').'/'.Auth::user()->dato->id}}">Actualizar</a>
					@if(Auth::user()->dato->afiliado == 0)
					<a class="btn waves-effect waves-light red" href="{{url('/afiliar')}}">Afiliarse</a>
					@elseif(Auth::user()->dato->afiliado == 1)
					En espera por aprobación de afiliación
					@elseif(Auth::user()->dato->afiliado == 2)
					<a class="btn waves-effect waves-light red" href="{{url('camara').'/'.hashid()->encode(Auth::user()->id)}}">Transmitir Cámara</a>
					@endif


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
			@if(Auth::user()->dato->afiliado == 2)
			<tr>
				<td>Precio de Cam por Sesión:</td>
				<td>{{Auth::user()->dato->precio_cam_sesion}}</td>
			</tr>

			<tr>
				<td>Precio de Cam por hora:</td>
				<td>{{Auth::user()->dato->precio_cam_hora}}</td>
			</tr>

			<tr>
				<td>Citas:</td>
				<td>@if(Auth::user()->dato->citas == 1)Activado @else No seleccionado @endif</td>
			</tr>

			<tr>
				<td>Precio de Cita por Hora:</td>
				<td>{{Auth::user()->dato->precio_cita_hora}}</td>
			</tr>

			<tr>
				<td>Precio de Cita por Día:</td>
				<td>{{Auth::user()->dato->precio_cita_dia}}</td>
			</tr>

			<tr>
				<td>Detalles del servicio Cita:</td>
				<td>{{Auth::user()->dato->detalles_cita}}</td>
			</tr>
			@endif
		</table>

    </div>
    <div id="fotos" class="col s12">

				<div class="row">
			<div class="col s6">
				<h4>Agregar Fotos</h4>
			</div>
			<div class="col s6">
				<form action="{{url('foto/guardar')}}" method="post" enctype="multipart/form-data">
				<input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
				
				<div class="file-field input-field">
			      <div class="btn">
			        <span>Foto</span>
			        <input type="file" name="url" id="url" required>
			      </div>
			      <div class="file-path-wrapper">
			        <input class="file-path validate" type="text">
			      </div>
			    </div>
				


				<button class="btn waves-effect waves-light red" type="submit">Subir</button>
				</form>
			</div>
		</div>
		
		@foreach(Auth::user()->foto->chunk(3) as $row)
				
				<div class="row">
					@foreach($row as $foto)
					<div class="col m4 s12">
                  
                    
                    <div class="imagen">
                    	<img src="{{ url('storage').'/'.$foto->url }}" class="imgcam materialboxed">

                    </div>
                    @if($foto->publico==1)
                    <a href="{{url('usuario/cambiar').'/'.hashid()->encode($foto->id).'/2'}}" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">visibility</i></a>
                    @elseif($foto->publico==2)
                    <a href="{{url('usuario/cambiar').'/'.hashid()->encode($foto->id).'/1'}}" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">visibility_off</i></a>
                    @endif

                 
                </div>
					@endforeach
				</div>
	
			@endforeach

    </div>
    <div id="creditos" class="col s12">

    <table class="table table-hover" >
			<tr>
				<td><h4>Créditos Disponibles:</h4></td>
				<td>
					<h4>{{Auth::user()->billetera->disponible}}</h4>
				</td>
			</tr>
			<tr>
				<td><a href="{{url('/comprar')}}" class="btn waves-effect waves-light red">Comprar Créditos</a></td>
				<td><a href="{{url('/movimientos')}}" class="btn waves-effect waves-light red">Historial de Movimientos</a></td>
			</tr>
		</table>

	</div>
  </div>




@endsection
