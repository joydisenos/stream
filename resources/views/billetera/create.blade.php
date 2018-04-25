@extends('scaffold-interface.layouts.app')
@section('title','Create')
@section('content')

<section class="content">
    <h1>
        Create billetera
    </h1>
    <a href="{!!url('billetera')!!}" class = 'btn btn-danger'><i class="fa fa-home"></i> Billetera Index</a>
    <br>
    <form method = 'POST' action = '{!!url("billetera")!!}'>
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <div class="form-group">
            
            <input id="user_id" name = "user_id" type="hidden" value="{{ Auth::user()->id }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="disponible">disponible</label>
            <input id="disponible" name = "disponible" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label for="estado">estado</label>
            <input id="estado" name = "estado" type="text" class="form-control">
        </div>
        <button class = 'btn btn-success' type ='submit'> <i class="fa fa-floppy-o"></i> Save</button>
    </form>
</section>
@endsection