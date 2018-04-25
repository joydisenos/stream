@extends('scaffold-interface.layouts.app')
@section('title','Show')
@section('content')

<section class="content">
    <h1>
        Show movimiento
    </h1>
    <br>
    <a href='{!!url("movimiento")!!}' class = 'btn btn-primary'><i class="fa fa-home"></i>Movimiento Index</a>
    <br>
    <table class = 'table table-bordered'>
        <thead>
            <th>Key</th>
            <th>Value</th>
        </thead>
        <tbody>
            <tr>
                <td> <b>user_id</b> </td>
                <td>{!!$movimiento->user->name!!}</td>
            </tr>
            <tr>
                <td> <b>cantidad</b> </td>
                <td>{!!$movimiento->cantidad!!}</td>
            </tr>
            <tr>
                <td> <b>estado</b> </td>
                <td>{!!$movimiento->estado!!}</td>
            </tr>
            <tr>
                <td> <b>transaccion</b> </td>
                <td>{!!$movimiento->transaccion!!}</td>
            </tr>
            <tr>
                <td> <b>numero_trans</b> </td>
                <td>{!!$movimiento->numero_trans!!}</td>
            </tr>
        </tbody>
    </table>
</section>
@endsection