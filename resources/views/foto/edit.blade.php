@extends('scaffold-interface.layouts.app')
@section('title','Edit')
@section('content')

<section class="content">
    <h1>
        Edit foto
    </h1>
    <a href="{!!url('foto')!!}" class = 'btn btn-primary'><i class="fa fa-home"></i> Foto Index</a>
    <br>
    <form method = 'POST' action = '{!! url("foto")!!}/{!!$foto->
        id!!}/update'> 
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <div class="form-group">
            <label for="url">url</label>
            <input id="url" name = "url" type="text" class="form-control" value="{!!$foto->
            url!!}"> 
        </div>
        <div class="form-group">
            <label for="tags">tags</label>
            <input id="tags" name = "tags" type="text" class="form-control" value="{!!$foto->
            tags!!}"> 
        </div>
        <div class="form-group">
            <label for="user_id">user_id</label>
            <input id="user_id" name = "user_id" type="text" class="form-control" value="{!!$foto->
            user_id!!}"> 
        </div>
        <div class="form-group">
            <label for="titulo">titulo</label>
            <input id="titulo" name = "titulo" type="text" class="form-control" value="{!!$foto->
            titulo!!}"> 
        </div>
        <button class = 'btn btn-success' type ='submit'><i class="fa fa-floppy-o"></i> Update</button>
    </form>
</section>
@endsection