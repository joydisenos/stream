@extends('scaffold-interface.layouts.app')
@section('title','Create')
@section('content')

<section class="content">
    <h1>
        Create movimiento
    </h1>
    <a href="{!!url('movimiento')!!}" class = 'btn btn-danger'><i class="fa fa-home"></i> Movimiento Index</a>
    <br>
    <form method = 'POST' action = '{!!url("movimiento")!!}'>
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <div class="form-group">
            <label for="user_id">user_id</label>
            <input id="user_id" name = "user_id" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label for="cantidad">cantidad</label>
            <input id="cantidad" name = "cantidad" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label for="estado">estado</label>
            <input id="estado" name = "estado" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label for="transaccion">transaccion</label>
            <input id="transaccion" name = "transaccion" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label for="numero_trans">numero_trans</label>
            <input id="numero_trans" name = "numero_trans" type="text" class="form-control">
        </div>
        <button class = 'btn btn-success' type ='submit'> <i class="fa fa-floppy-o"></i> Save</button>
    </form>
</section>
@endsection