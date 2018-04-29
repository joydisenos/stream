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
            @if($billetera->estado == 1)
            <td>Activa</td>
            @elseif($billetera->estado == 2)
            <td><i></i>Suspendida</td>
            @endif
                <td>
                    
                    <a href = "{{url('billetera').'/'.hashid()->encode($billetera->id).'/edit'}}" class = 'viewEdit btn btn-primary btn-xs'><i class = 'fa fa-edit'> edit</i></a>
                </td>
            </tr>
            @endforeach 
        </tbody>
    </table>
    {!! $billeteras->render() !!}

</section>
@endsection