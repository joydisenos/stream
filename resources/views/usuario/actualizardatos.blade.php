@extends('layouts.frontui')

@section('titulo')

Zona de Usuarios

@endsection

@section('content')
<div class="bg-gray text-center">
        <h3>
        Editar Perfil
        </h3>
   </div>
<section class="container">
   
   
    <form method = 'POST' action = '{!! url("dato")!!}/{!!$dato->
        id!!}/actualizar' enctype="multipart/form-data"> 
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <input id="user_id" name = "user_id" type="hidden" class="form-control" value="{!!$dato->
            user_id!!}"> 

        <div class="form-group">
            <div class="row">
                <div class="col s6 file-field input-field">
                <div class="btn blue darken-4">
                    <span>Foto de Perfil</span>
                    <input type="file" id="foto_perfil" name="foto_perfil" class="form-control">
                </div>
                <div class="file-path-wrapper">
                     <input class="file-path validate" type="text">
                </div>
            </div>
            <div class="col s6">
                <img src="{{asset('/storage').'/'.$dato->foto_perfil}}" alt="Foto de perfil {{$dato->user->name}}" width="200" id="perfil_prev" class="fotoperfil">
            </div>
            </div>
        </div>
     
        <div class="row">
             <div class="input-field col s12">
            <label for="biografia">Biografía</label>
            <textarea id="biografia" name = "biografia" type="text" class="materialize-textarea" >{!!$dato->
            biografia!!}</textarea>
        </div>
        </div>
        <div class="row">
             <div class="input-field col s12">
            <label for="nacimiento_ano">Año de Nacimiento</label>
            <input id="nacimiento_ano" name = "nacimiento_ano" type="number" class="form-control" value="{!!$dato->
            nacimiento_ano!!}" required> 
        </div>
        </div>
        <div class="row">
             <div class="input-field col s12">
           
            <select id="sexo" name = "sexo" type="text" class="form-control" value="{!!$dato->
            sexo!!}">
                <option value="hombre">Hombre</option>
                <option value="mujer">Mujer</option>
                <option value="pareja">Pareja</option>
                <option value="trans">Trans</option>
            </select> 
             <label for="sexo">Sexo</label>
        </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <label for="localidad">Localidad</label>
                <input id="localidad" name = "localidad" type="text" class="form-control" value="{!!$dato->
            localidad!!}"> 
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">

            <select id="interes" name = "interes" type="text">
                <option value="hombres">Hombres</option>
                <option value="mujeres">Mujeres</option>
                <option value="parejas">Parejas</option>
                <option value="hombresymujeres">Hombres y Mujeres</option>
                <option value="trans">Trans</option>
                <option value="sp">Sin Preferencia</option>
            </select> 

            <label for="interes">Interés</label>
            </div>
        </div>

@if($dato->afiliado == 2)
       <h5>Datos Personales</h5>
       <div class="row">
        <div class="input-field col s6">
          <input id="edad" name="edad" type="number" class="citas-form" required value="{{$dato->edad}}">
          <label for="edad">Edad</label>
        </div>

        <div class="input-field col s6">
          <input id="telefono" name="telefono" type="number" class="citas-form" required value="{{$dato->telefono}}">
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

       <!--
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
       -->
    
        <h5>Costo por transmisión de cámara</h5>
    <div class="row">
        <div class="input-field col s6">
          <input id="precio_cam_sesion" name="precio_cam_sesion" type="number" class="" required value="{{$dato->precio_cam_sesion}}" >
          <label for="precio_cam_sesion">Precio por Sesión (USD)</label>
        </div>

        <div class="input-field col s6">
          <input id="precio_cam_hora" name="precio_cam_hora" type="number" class="" required  value="{{$dato->precio_cam_hora}}">
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
          <input id="precio_cita_hora" name="precio_cita_hora" type="number" class="citas-form" value="{{$dato->precio_cita_hora}}">
          <label for="precio_cita_hora" >Precio de Cita por Hora</label>
        </div>

        <div class="input-field col s6">
          <input id="precio_cita_dia" name="precio_cita_dia" type="number" class="citas-form" value="{{$dato->precio_cita_dia}}">
          <label for="precio_cita_dia" >Precio de Cita por Día</label>
        </div>
        
    </div>

    <div class="row">
        <div class="input-field col s12">
            <textarea name="detalles_cita" id="detalles_cita" cols="30" rows="30" class="citas-form">{{$dato->detalles_cita}}</textarea>
            <label for="detalles_cita">Descripción del servicio de Citas</label>
        </div>
    </div>
@endif
        <button class = 'waves-effect blue waves-light btn btn-success' type ='submit'><i class="fa fa-floppy-o"></i> Actualizar</button>
    </form>
</section>
@endsection
@section('scripts')
<script>
  function readURL(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#perfil_prev').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$("#foto_perfil").change(function() {
  readURL(this);
});
</script>
@endsection