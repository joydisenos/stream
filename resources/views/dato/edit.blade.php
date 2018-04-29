@extends('scaffold-interface.layouts.app')
@section('title','Edit')
@section('content')

<section class="content">
    <h1>
        Editar Perfil
    </h1>
    <a href="{!!url('perfil')!!}" class = 'btn btn-primary'><i class="fa fa-home"></i> Perfil</a>
    <br>
    <form method = 'POST' action = '{!! url("dato")!!}/{!!$dato->
        id!!}/update'> 
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <input id="user_id" name = "user_id" type="hidden" class="form-control" value="{!!$dato->
            user_id!!}"> 
      
        <div class="form-group">
            <label for="biografia">Biografía</label>
            <textarea id="biografia" name = "biografia" type="text" class="form-control">{!!$dato->biografia!!}</textarea> 
        </div>
        <div class="form-group">
            <label for="nacimiento_ano">Año de Nacimiento</label>
            <input id="nacimiento_ano" name = "nacimiento_ano" type="number" class="form-control" value="{!!$dato->
            nacimiento_ano!!}"> 
        </div>
        <div class="form-group">
            <label for="sexo">Sexo</label>
            <input id="sexo" name = "sexo" type="text" class="form-control" value="{!!$dato->
            sexo!!}"> 
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
        <button class = 'btn btn-success' type ='submit'><i class="fa fa-floppy-o"></i> Actualizar</button>
    </form>
</section>
@endsection