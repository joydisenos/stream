@extends('scaffold-interface.layouts.app')
@section('title','Show')
@section('content')

<section class="content">
    <h1>
        Show billetera
    </h1>
    <br>
    <a href='{!!url("billetera")!!}' class = 'btn btn-primary'><i class="fa fa-home"></i>Billetera Index</a>
    <br>
    <table class = 'table table-bordered'>
        <thead>
            <th>Key</th>
            <th>Value</th>
        </thead>
        <tbody>
            <tr>
                <td> <b>user_id</b> </td>
                <td>{!!$billetera->user_id!!}</td>
            </tr>
            <tr>
                <td> <b>disponible</b> </td>
                <td>{!!$billetera->disponible!!}</td>
            </tr>
            <tr>
                <td> <b>estado</b> </td>
                <td>{!!$billetera->estado!!}</td>
            </tr>
        </tbody>
    </table>
</section>
@endsection