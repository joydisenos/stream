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
                <img src="{{asset('/storage').'/'.$dato->foto_perfil}}" alt="Foto de perfil {{$dato->user->name}}" class="fotoperfil">
            </div>
            </div>
        </div>
     
        <div class="form-group">
            <label for="biografia">Biografía</label>
            <textarea id="biografia" name = "biografia" type="text" class="form-control" > {!!$dato->
            biografia!!} </textarea>
        </div>
        <div class="form-group">
            <label for="nacimiento_ano">Año de Nacimiento</label>
            <input id="nacimiento_ano" name = "nacimiento_ano" type="number" class="form-control" value="{!!$dato->
            nacimiento_ano!!}" required> 
        </div>
        <div class="form-group">
            <label for="sexo">Sexo</label>
            <select id="sexo" name = "sexo" type="text" class="form-control" value="{!!$dato->
            sexo!!}">
                <option value="hombre">Hombre</option>
                <option value="mujer">Mujer</option>
                <option value="pareja">Pareja</option>
                <option value="trans">Trans</option>
            </select> 
        </div>
        <div class="form-group">
            <label for="localidad">Localidad</label>
            <input id="localidad" name = "localidad" type="text" class="form-control" value="{!!$dato->
            localidad!!}"> 
        </div>
        <div class="form-group">
            <label for="interes">Interés</label>
            <select id="interes" name = "interes" type="text" class="form-control" value="{!!$dato->
            interes!!}">
                <option value="hombres">Hombres</option>
                <option value="mujeres">Mujeres</option>
                <option value="parejas">Parejas</option>
                <option value="hombresymujeres">Hombres y Mujeres</option>
                <option value="trans">Trans</option>
                <option value="sp">Sin Preferencia</option>
            </select> 
        </div>
        <button class = 'waves-effect blue waves-light btn btn-success' type ='submit'><i class="fa fa-floppy-o"></i> Actualizar</button>
    </form>
</section>
@endsection