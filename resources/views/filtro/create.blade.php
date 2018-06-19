@extends('scaffold-interface.layouts.app')
@section('title','Create')
@section('content')

<section class="content">
    <h1>
        Crear Categoría
    </h1>
    <a href="{!!url('filtro')!!}" class = 'btn btn-danger'><i class="fa fa-home"></i> Lista de Categorías</a>
    <br>
    <form method = 'POST' action = '{!!url("filtro")!!}'>
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input id="nombre" name = "nombre" type="text" class="form-control">
        </div>
     
            
            <input id="estatus" name = "estatus" type="hidden" class="form-control" value="1"> 
  
        <button class = 'btn btn-success' type ='submit'> <i class="fa fa-floppy-o"></i> Crear</button>
    </form>
</section>
@endsection