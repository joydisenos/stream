@extends('scaffold-interface.layouts.app')
@section('title','Show')
@section('content')

<section class="content">
    <h1>
        Show foto
    </h1>
    <br>
    <a href='{!!url("foto")!!}' class = 'btn btn-primary'><i class="fa fa-home"></i>Foto Index</a>
    <br>
    <table class = 'table table-bordered'>
        <thead>
            <th>Key</th>
            <th>Value</th>
        </thead>
        <tbody>
            <tr>
                <td> <b>url</b> </td>
                <td>{!!$foto->url!!}</td>
            </tr>
            <tr>
                <td> <b>tags</b> </td>
                <td>{!!$foto->tags!!}</td>
            </tr>
            <tr>
                <td> <b>user_id</b> </td>
                <td>{!!$foto->user_id!!}</td>
            </tr>
            <tr>
                <td> <b>titulo</b> </td>
                <td>{!!$foto->titulo!!}</td>
            </tr>
        </tbody>
    </table>
</section>
@endsection