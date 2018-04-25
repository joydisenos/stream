@extends('scaffold-interface.layouts.app')
@section('title','Edit')
@section('content')

<section class="content">
    <h1>
        Edit billetera
    </h1>
    <a href="{!!url('billetera')!!}" class = 'btn btn-primary'><i class="fa fa-home"></i> Billetera Index</a>
    <br>
    <form method = 'POST' action = '{!! url("billetera")!!}/{!!$billetera->
        id!!}/update'> 
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <div class="form-group">
            <label for="user_id">user_id</label>
            <input id="user_id" name = "user_id" type="text" class="form-control" value="{!!$billetera->
            user_id!!}"> 
        </div>
        <div class="form-group">
            <label for="disponible">disponible</label>
            <input id="disponible" name = "disponible" type="text" class="form-control" value="{!!$billetera->
            disponible!!}"> 
        </div>
        <div class="form-group">
            <label for="estado">estado</label>
            <input id="estado" name = "estado" type="text" class="form-control" value="{!!$billetera->
            estado!!}"> 
        </div>
        <button class = 'btn btn-success' type ='submit'><i class="fa fa-floppy-o"></i> Update</button>
    </form>
</section>
@endsection