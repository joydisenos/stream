@extends('layouts.frontui')

@section('titulo')

Zona de Usuarios

@endsection

@section('content')

<div class="row">
    <div class="col s12 blue-text" style="margin:5px auto;">
      <ul class="tabs">
        <li class="tab col"><a href="#topcamaras">Top Camaras</a></li>
        <li class="tab col"><a class="active" href="#perfil">Perfil</a></li>
        <li class="tab col"><a href="#fotos">Mis Fotos</a></li>
        <li class="tab col"><a href="#creditos">Créditos</a></li>
        @if(Auth::user()->dato->afiliado == 2)
        <li class="tab col"><a href="#depositos">Depósitos</a></li>
        <li class="tab col"><a href="#citas">Citas Solicitadas</a></li>
        @else
        @endif
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
				<td>Edad:</td>
				<td>{{Auth::user()->dato->edad}}</td>
			</tr>
			
			<tr>
				<td>Provincia:</td>
				<td>{{Auth::user()->dato->provincia}}</td>
			</tr>

			<tr>
				<td>Teléfono:</td>
				<td>{{Auth::user()->dato->telefono}}</td>
			</tr>

			<tr>
				<td>Categorías:</td>
				<td>
					@foreach(Auth::user()->categorias as $categoria)
					{{$categoria->filtro->nombre}},
					@endforeach
				</td>
			</tr>

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
				

				<form action="{{url('foto/guardar')}}" method="post" class="dropzone" id="fotosperfil" enctype="multipart/form-data">
        
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        
    </form>


			</div>
		</div>
		
		@foreach(Auth::user()->foto->chunk(3) as $row)
				
				<div class="row">
					@foreach($row as $foto)
					<div class="col m4 s12">
                  
                    
                    <div class="imagen tooltipped" data-position="top" data-tooltip="Presiona el botón rojo para elegir entre foto pública o privada">
                    	<img src="{{ url('storage').'/'.$foto->url }}" class="imgcam materialboxed">

                    </div>
                    @if($foto->publico==1)
                    <a href="{{url('usuario/cambiar').'/'.hashid()->encode($foto->id).'/2'}}" class="btn-floating btn-large waves-effect waves-light red tooltipped"  data-position="right" data-tooltip="Presiona para cambiar a foto privada"><i class="material-icons">visibility</i></a>
                    @elseif($foto->publico==2)
                    <a href="{{url('usuario/cambiar').'/'.hashid()->encode($foto->id).'/1'}}" class="btn-floating btn-large waves-effect waves-light red tooltipped" data-position="right" data-tooltip="Presiona para cambiar a foto pública"><i class="material-icons">visibility_off</i></a>
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

	@if(Auth::user()->dato->afiliado == 2)
    <div id="depositos" class="col s12">

    	<table class="table table-hover" >
			<tr>
				<td></td>
				<td></td>
				<td><h4>Total depósitos recibidos:</h4></td>
				<td>
					<h4>{{Auth::user()->gana->count()}}</h4>
				</td>
			</tr>
			@foreach(Auth::user()->gana as $recibido)
			<tr>
				<td>{{hashid()->encode($recibido->id)}}</td>
				<td>
					@if($recibido->estatus == 1)
					Pago en Evaluación
					@elseif($recibido->estatus == 2)
					Depositado
					@endif
				</td>
				<td>{{$recibido->created_at}}</td>
				<td>{{$recibido->creditos}}</td>
			</tr>
			@endforeach
		</table>

	</div>

	<div id="citas" class="col s12">

    	<table class="table table-hover" >
			<tr>
				<td></td>
				<td></td>
				<td><h4>Total depósitos recibidos:</h4></td>
				<td>
					<h4>{{Auth::user()->citas->count()}}</h4>
				</td>
			</tr>
			<tr>
				<td>Número de Orden</td>
				<td>Estatus</td>
				
				<td>Detalles</td>
				<td>Fecha de solicitud</td>
			</tr>
			@foreach(Auth::user()->citas as $recibido)
			<tr>
				<td>{{hashid()->encode($recibido->id)}}</td>
				<td>
					@if($recibido->estatus == 1)
					Por Ejecutar
					@elseif($recibido->estatus == 2)
					Terminado
					@endif
				</td>
				<td>{{$recibido->detalles}}</td>
				<td>{{$recibido->created_at->format('d/m')}}</td>
				
			</tr>
			@endforeach
		</table>

	</div>
    @endif
  </div>




@endsection
@section('scripts')
<script>
  Dropzone.options.fotosperfil = {
    paramName: "file", // Las imágenes se van a usar bajo este nombre de parámetro
    maxFilesize: 12 // Tamaño máximo en MB

};
</script>
@endsection