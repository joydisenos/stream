@extends('scaffold-interface.layouts.app')
@section('title','Edit')
@section('content')

<section class="content">
    <h1>
        Editar Categoría
    </h1>
    <a href="{!!url('filtro')!!}" class = 'btn btn-primary'><i class="fa fa-home"></i> Lista de Categorías</a>
    <br>
    <form method = 'POST' action = '{!! url("filtro")!!}/{!!$filtro->
        id!!}/update'> 
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input id="nombre" name = "nombre" type="text" class="form-control" value="{!!$filtro->
            nombre!!}"> 
     
            <input id="estatus" name = "estatus" type="hidden" class="form-control" value="1"> 
        </div>

        <div class="form-group">
            <button class = 'btn btn-success' type ='submit'><i class="fa fa-floppy-o"></i> Actualizar</button>
        </div>
    </form>
</section>
@endsection