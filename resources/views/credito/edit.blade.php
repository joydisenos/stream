@extends('scaffold-interface.layouts.app')
@section('title','Editar')
@section('content')

<section class="content">
    <h1>
       Editar Promoción
    </h1>
    <a href="{!!url('credito')!!}" class = 'btn btn-primary'><i class="fa fa-home"></i> Lista de promociones</a>
    <br>
    <form method = 'POST' action = '{!! url("credito")!!}/{!!$credito->
        id!!}/update'> 
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input id="nombre" name = "nombre" type="text" class="form-control" value="{!!$credito->
            nombre!!}"> 
        </div>
        <div class="form-group">
            <label for="cantidad">Cantidad de Créditos</label>
            <input id="cantidad" name = "cantidad" type="text" class="form-control" value="{!!$credito->
            cantidad!!}"> 
        </div>
        <div class="form-group">
            <label for="valor">Valor (USD)</label>
            <input id="valor" name = "valor" type="text" class="form-control" value="{!!$credito->
            valor!!}"> 
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <input id="descripcion" name = "descripcion" type="text" class="form-control" value="{!!$credito->
            descripcion!!}"> 
        </div>
        <button class = 'btn btn-success' type ='submit'><i class="fa fa-floppy-o"></i> Actualizar</button>
    </form>
</section>
@endsection