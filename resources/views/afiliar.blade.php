@extends('layouts.frontui')
@section('content')



<div class="row">
	<div class="col s12">
		




        
    <?php 

	$fotos = Auth::user()->foto->count();

	 ?>



<div class="container">
	
	@if($fotos>4)
	
	<form method = 'POST' action = '{!! url("afiliar") !!}' enctype="multipart/form-data"> 
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>

<h5>Datos Personales</h5>
       <div class="row">
        <div class="input-field col s6">
          <input id="edad" name="edad" type="number" class="citas-form" required>
          <label for="edad">Edad</label>
        </div>

        <div class="input-field col s6">
          <input id="telefono" name="telefono" type="number" class="citas-form" required>
          <label for="telefono">Número Telefónico</label>
        </div>
       </div>

       <div class="row">
  <div class="input-field col s12">
    <select name="provincia" id="provincia" required>
      <option value="" disabled selected>Seleccione su Provincia</option>
      <option value="San Jose">San José</option>
      <option value="Heredia">Heredia</option>
      <option value="Alajuela">Alajuela</option>
      <option value="Cartago">Cartago</option>
      <option value="Puntarenas">Puntarenas</option>
      <option value="Limon">Limón</option>
      <option value="Guanacaste">Guanacaste</option>
    </select>
    <label>Provincia</label>
  </div>
       </div>

        <div class="row">
        	<h5>Seleccione una o varias categorías que la describan</h5>

    <p>
      <label> 
        <input type="checkbox" name="natural" id="natural" value="1" />
        <span>Natural</span>
      </label>
    </p>

    <p>
      <label> 
        <input type="checkbox" name="fitness" id="fitness" value="1" />
        <span>Cuerpo Fitness</span>
      </label>
    </p>

    <p>
      <label> 
        <input type="checkbox" name="grandespechos" id="grandespechos" value="1" />
        <span>Grandes Pechos</span>
      </label>
    </p>

    <p>
      <label> 
        <input type="checkbox" name="trasero" id="trasero" value="1" />
        <span>Gran Trasero</span>
      </label>
    </p>

        </div>
	
		<h5>Costo por transmisión de cámara</h5>
	<div class="row">
		<div class="input-field col s6">
          <input id="precio_cam_sesion" name="precio_cam_sesion" type="number" class="" required >
          <label for="precio_cam_sesion">Precio por Sesión (USD)</label>
        </div>

        <div class="input-field col s6">
          <input id="precio_cam_hora" name="precio_cam_hora" type="number" class="" required >
          <label for="precio_cam_hora">Precio por Minuto (USD)</label>
        </div>

	</div>

	<p>
      <label> 
        <input type="checkbox" name="citas" id="citas" value="1" />
        <span>Ofrecer servicio de Citas</span>
      </label>
    </p>

	<div class="row">
		<div class="input-field col s6">
          <input id="precio_cita_hora" name="precio_cita_hora" type="number" class="citas-form">
          <label for="precio_cita_hora">Precio de Cita por Hora (USD)</label>
        </div>

        <div class="input-field col s6">
          <input id="precio_cita_dia" name="precio_cita_dia" type="number" class="citas-form">
          <label for="precio_cita_dia">Precio de Cita por Día (USD)</label>
        </div>
		
	</div>

	<div class="row">
		<div class="input-field col s12">
			<div class="row">
			<textarea name="detalles_cita" id="detalles_cita" cols="30" rows="30" class="citas-form" class="materialize-textarea"></textarea>
			<label for="detalles_cita">Descripción del servicio de Citas</label>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col s12">
			<div class="terminos">
				<h6>Términos y condiciones</h6>
				<p>Términos y condiciones de uso de la plataforma VIP Escorts CR</p>
			</div>
		</div>
	</div>


	<p>
      <label>
        <input type="checkbox" required />
        <span>Acepto los términos y condiciones</span>
      </label>
    </p>
	
    <button type="submit" class="waves-effect blue waves-light btn">Enviar Solicitud</button>
</div>

    </form>

	</div>
	@else
	<h6>Debe al menos tener 5 fotos para continuar su afiliación</h6>
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
	@endif
</div>



@endsection