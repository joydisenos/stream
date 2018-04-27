@extends('scaffold-interface.layouts.app')
@section('title','Index')
@section('content')

<section class="content">
    <h1>
        Billeteras de Usuarios
    </h1>
    

    
    <table class = "table table-striped table-bordered table-hover" style = 'background:#fff'>
        <thead>
            <th>Usuario</th>
            <th>Disponible</th>
            <th>estado</th>
            <th>actions</th>
        </thead>
        <tbody>
            @foreach($billeteras as $billetera) 
            <tr>
                <td>{!!$billetera->user->name!!}</td>
                <td>{!!$billetera->disponible!!}</td>
                <td>{!!$billetera->estado!!}</td>
                <td>
                    <a data-toggle="modal" data-target="#myModal" class = 'delete btn btn-danger btn-xs' data-link = "/billetera/{!!$billetera->id!!}/deleteMsg" ><i class = 'fa fa-trash'> delete</i></a>
                    <a href = '#' class = 'viewEdit btn btn-primary btn-xs' data-link = '/billetera/{!!$billetera->id!!}/edit'><i class = 'fa fa-edit'> edit</i></a>
                    <a href = '#' class = 'viewShow btn btn-warning btn-xs' data-link = '/billetera/{!!$billetera->id!!}'><i class = 'fa fa-eye'> info</i></a>
                </td>
            </tr>
            @endforeach 
        </tbody>
    </table>
    {!! $billeteras->render() !!}

</section>
@endsection