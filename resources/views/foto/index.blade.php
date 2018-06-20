@extends('scaffold-interface.layouts.app')
@section('title','Index')
@section('content')

<section class="content">
    <h1>
        Foto Index
    </h1>
    <input type="text" class="form-control" id="filtro">
    <table class = "table table-striped table-bordered table-hover" style = 'background:#fff' id="registros">
        <thead>

            <th>Miniatura</th>
            <th>Enlace</th>
        
            <th>Usuario</th>
  
            <th>Acciones</th>
        </thead>
        <tbody>
            @foreach($fotos as $foto) 
            <tr>
                <td><img width="150" src="{{asset('/storage')}}/{!!$foto->url!!}" alt=""></td>
                <td>{!!$foto->url!!}</td>
              
                <td>{!!$foto->user_id!!}</td>

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