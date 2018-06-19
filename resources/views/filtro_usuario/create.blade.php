@extends('scaffold-interface.layouts.app')
@section('title','Create')
@section('content')

<section class="content">
    <h1>
        Create filtro_usuario
    </h1>
    <a href="{!!url('filtro_usuario')!!}" class = 'btn btn-danger'><i class="fa fa-home"></i> Filtro_usuario Index</a>
    <br>
    <form method = 'POST' action = '{!!url("filtro_usuario")!!}'>
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <div class="form-group">
            <label for="user_id">user_id</label>
            <input id="user_id" name = "user_id" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label for="filtro_id">filtro_id</label>
            <input id="filtro_id" name = "filtro_id" type="text" class="form-control">
        </div>
        <button class = 'btn btn-success' type ='submit'> <i class="fa fa-floppy-o"></i> Save</button>
    </form>
</section>
@endsection