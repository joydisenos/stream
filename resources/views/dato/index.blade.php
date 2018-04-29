@extends('scaffold-interface.layouts.app')
@section('title','Index')
@section('content')

<section class="content">
    <h1>
        Datos usuarios
    </h1>
    
    <table class = "table table-striped table-bordered table-hover" style = 'background:#fff'>
        <thead>
            <th>Usuario</th>
            <th>Biografía</th>
            <th>Año de nacimiento</th>
            <th>Sexo</th>
            <th>Localidad</th>
            <th>Interés</th>
            <td>Perfil</td>
        </thead>
        <tbody>
            @foreach($datos as $dato) 
            <tr>
                <td>{!!$dato->user->name!!}</td>
                <td>{!!$dato->biografia!!}</td>
                <td>{!!$dato->nacimiento_ano!!}</td>
                <td>{!!$dato->sexo!!}</td>
                <td>{!!$dato->localidad!!}</td>
                <td>{!!$dato->interes!!}</td>
                <td>
                @if(!empty($dato->user->roles))
                    @foreach($dato->user->roles as $role)
                    <small class = 'label bg-blue'>{{$role->name}}</small>
                    @endforeach
                @endif

                </td>                
            </tr>
            @endforeach 
        </tbody>
    </table>
    {!! $datos->render() !!}

</section>
@endsection