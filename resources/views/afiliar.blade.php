@extends('layouts.frontui')
@section('content')



<div class="row">
	<div class="col s12">
		
<form method = 'POST' action = '{!! url("afiliar") !!}' enctype="multipart/form-data"> 
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>



        
    

<div class="container">
	
	<h5>Costo por transmisión de cámara</h5>
	<div class="row">
		<div class="input-field col s6">
          <input id="precio_cam_sesion" name="precio_cam_sesion" type="number" class="" required >
          <label for="precio_cam_sesion">Precio por Sesión</label>
        </div>

        <div class="input-field col s6">
          <input id="precio_cam_hora" name="precio_cam_hora" type="number" class="" required >
          <label for="precio_cam_hora">Precio por Horas</label>
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
          <label for="precio_cita_hora">Precio de Cita por Hora</label>
        </div>

        <div class="input-field col s6">
          <input id="precio_cita_dia" name="precio_cita_dia" type="number" class="citas-form">
          <label for="precio_cita_dia">Precio de Cita por Día</label>
        </div>
		
	</div>

	<div class="row">
		<div class="input-field col s12">
			<textarea name="detalles_cita" id="detalles_cita" cols="30" rows="30" class="citas-form"></textarea>
			<label for="detalles_cita">Descripción del servicio de Citas</label>
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
</div>



@endsection