@extends('scaffold-interface.layouts.app')
@section('title','Show')
@section('content')

<section class="content">
    <h1>
        Show dato
    </h1>
    <br>
    <a href='{!!url("dato")!!}' class = 'btn btn-primary'><i class="fa fa-home"></i>Dato Index</a>
    <br>
    <table class = 'table table-bordered'>
        <thead>
            <th>Key</th>
            <th>Value</th>
        </thead>
        <tbody>
            <tr>
                <td> <b>Usuario</b> </td>
                <td>{!!$dato->user->name!!}</td>
            </tr>
            <tr>
                <td> <b>biografia</b> </td>
                <td>{!!$dato->biografia!!}</td>
            </tr>
            <tr>
                <td> <b>nacimiento_ano</b> </td>
                <td>{!!$dato->nacimiento_ano!!}</td>
            </tr>
            <tr>
                <td> <b>sexo</b> </td>
                <td>{!!$dato->sexo!!}</td>
            </tr>
            <tr>
                <td> <b>localidad</b> </td>
                <td>{!!$dato->localidad!!}</td>
            </tr>
            <tr>
                <td> <b>interes</b> </td>
                <td>{!!$dato->interes!!}</td>
            </tr>
        </tbody>
    </table>
</section>
@endsection