@extends('scaffold-interface.layouts.app')
@section('title','Index')
@section('content')

<section class="content">
    <h1>
        Foto Index
    </h1>
    <a href='{!!url("foto")!!}/create' class = 'btn btn-success'><i class="fa fa-plus"></i> New</a>
    <br>
    <br>
    <table class = "table table-striped table-bordered table-hover" style = 'background:#fff'>
        <thead>
            <th>url</th>
            <th>tags</th>
            <th>user_id</th>
            <th>titulo</th>
            <th>actions</th>
        </thead>
        <tbody>
            @foreach($fotos as $foto) 
            <tr>
                <td>{!!$foto->url!!}</td>
                <td>{!!$foto->tags!!}</td>
                <td>{!!$foto->user_id!!}</td>
                <td>{!!$foto->titulo!!}</td>
                <td>
                    <a data-toggle="modal" data-target="#myModal" class = 'delete btn btn-danger btn-xs' data-link = "/foto/{!!$foto->id!!}/deleteMsg" ><i class = 'fa fa-trash'> delete</i></a>
                    <a href = '#' class = 'viewEdit btn btn-primary btn-xs' data-link = '/foto/{!!$foto->id!!}/edit'><i class = 'fa fa-edit'> edit</i></a>
                    <a href = '#' class = 'viewShow btn btn-warning btn-xs' data-link = '/foto/{!!$foto->id!!}'><i class = 'fa fa-eye'> info</i></a>
                </td>
            </tr>
            @endforeach 
        </tbody>
    </table>
    {!! $fotos->render() !!}

</section>
@endsection