@extends('scaffold-interface.layouts.app')
@section('title','Create')
@section('content')

<section class="content">
    <h1>
        Create dato
    </h1>
    <a href="{!!url('dato')!!}" class = 'btn btn-danger'><i class="fa fa-home"></i> Dato Index</a>
    <br>
    <form method = 'POST' action = '{!!url("dato")!!}'>
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <div class="form-group">
            <label for="user_id">user_id</label>
            <input id="user_id" value="{{   Auth::user()->id   }}" name = "user_id" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label for="biografia">biografia</label>
            <input id="biografia" name = "biografia" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label for="nacimiento_ano">nacimiento_ano</label>
            <input id="nacimiento_ano" name = "nacimiento_ano" type="number" class="form-control">
        </div>
        <div class="form-group">
            <label for="sexo">sexo</label>
            <select id="sexo" name = "sexo" type="text" class="form-control">
                <option value="1">Hombre</option>
                <option value="2">Mujer</option>
                <option value="3">Pareja</option>
                <option value="4">Trans</option>
            </select>
        </div>
        <div class="form-group">
            <label for="localidad">localidad</label>
            <input id="localidad" name = "localidad" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label for="interes">interes</label>
            <input id="interes" name = "interes" type="text" class="form-control">
        </div>
        <button class = 'btn btn-success' type ='submit'> <i class="fa fa-floppy-o"></i> Save</button>
    </form>
</section>
@endsection