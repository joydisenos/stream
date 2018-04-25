@extends('layouts.front')

@section('titulo')

Zona de Usuarios

@endsection

@section('content')
<section class="content">
    <h1>
        Editar Perfil
    </h1>
    <a href="{!!url('dato')!!}" class = 'btn btn-primary'><i class="fa fa-home"></i> Dato Index</a>
    <br>
    <form method = 'POST' action = '{!! url("dato")!!}/{!!$dato->
        id!!}/actualizar'> 
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <input id="user_id" name = "user_id" type="hidden" class="form-control" value="{!!$dato->
            user_id!!}"> 
     
        <div class="form-group">
            <label for="biografia">biografia</label>
            <input id="biografia" name = "biografia" type="text" class="form-control" value="{!!$dato->
            biografia!!}"> 
        </div>
        <div class="form-group">
            <label for="nacimiento_ano">nacimiento_ano</label>
            <input id="nacimiento_ano" name = "nacimiento_ano" type="text" class="form-control" value="{!!$dato->
            nacimiento_ano!!}"> 
        </div>
        <div class="form-group">
            <label for="sexo">sexo</label>
            <input id="sexo" name = "sexo" type="text" class="form-control" value="{!!$dato->
            sexo!!}"> 
        </div>
        <div class="form-group">
            <label for="localidad">localidad</label>
            <input id="localidad" name = "localidad" type="text" class="form-control" value="{!!$dato->
            localidad!!}"> 
        </div>
        <div class="form-group">
            <label for="interes">interes</label>
            <input id="interes" name = "interes" type="text" class="form-control" value="{!!$dato->
            interes!!}"> 
        </div>
        <button class = 'btn btn-success' type ='submit'><i class="fa fa-floppy-o"></i> Update</button>
    </form>
</section>
@endsection