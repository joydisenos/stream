@extends('scaffold-interface.layouts.app')
@section('title','Edit')
@section('content')

<section class="content">
    <h1>
        Edit billetera
    </h1>
    <a href="{!!url('billetera')!!}" class = 'btn btn-primary'><i class="fa fa-home"></i> Billeteras</a>
    <br>
    <form method = 'POST' action = '{!! url("billetera")!!}/{!!hashid()->encode($billetera->id)!!}/update'> 
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <div class="form-group">
            <label for="user_id">Usuario</label>
            <input id="user_id" name = "user_id" type="text" class="form-control" value="{!!$billetera->
            user->name!!}" disabled=""> 
        </div>
        <div class="form-group">
            <label for="disponible">disponible</label>
            <input id="disponible" name = "disponible" type="text" class="form-control" value="{!!$billetera->
            disponible!!}"> 
        </div>
        <div class="form-group">
            <label for="estado">estado</label>
            <select id="estado" name = "estado" type="text" class="form-control" value="{!!$billetera->
            estado!!}">
                <option value="1">Activa</option>
                <option value="2">Suspendida</option>
            </select> 
        </div>
        <button class = 'btn btn-success' type ='submit'><i class="fa fa-floppy-o"></i> Actualizar</button>
    </form>
</section>
@endsection