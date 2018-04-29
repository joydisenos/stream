@extends('layouts.front')

@section('titulo')

Zona de Usuarios

@endsection

@section('content')
<div class="bg-gray text-center">
        <h3>
        Comprar Créditos
    </h3>
   </div>
<section class="container">
 
    
    <form method = 'POST' action = '{!!url("comprar")!!}'>
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <input id="user_id" name = "user_id" type="hidden" class="form-control">
       
        <div class="form-group">
            <label for="cantidad">Cantidad a solicitar</label>
            <input id="cantidad" name = "cantidad" type="text" class="form-control">
        </div>
      
           
            <input id="transaccion" name = "transaccion" type="hidden" class="form-control" value="compra">
       
        <div class="form-group">
            <label for="numero_trans">Número de Transacción o Detalles</label>
            <textarea id="numero_trans" name = "numero_trans"  class="form-control"> </textarea>
        </div>
        <button class = 'btn btn-success' type ='submit'> <i class="fa fa-floppy-o"></i> Enviar Comprobante</button>
    </form>
</section>
@endsection