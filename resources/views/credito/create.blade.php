@extends('scaffold-interface.layouts.app')
@section('title','Crear')
@section('content')

<section class="content">
    <h1>
        Crear Promoción
    </h1>
    <a href="{!!url('credito')!!}" class = 'btn btn-danger'><i class="fa fa-home"></i> Lista de promociones</a>
    <br>
    <form method = 'POST' action = '{!!url("credito")!!}'>
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input id="nombre" name = "nombre" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label for="cantidad">Cantidad de Créditos</label>
            <input id="cantidad" name = "cantidad" type="number" class="form-control">
        </div>
        <div class="form-group">
            <label for="valor">Valor (USD)</label>
            <input id="valor" name = "valor" type="number" step="0.05" class="form-control">
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <input id="descripcion" name = "descripcion" type="text" class="form-control">
        </div>
        <button class = 'btn btn-success' type ='submit'> <i class="fa fa-floppy-o"></i> Crear</button>
    </form>
</section>
@endsection