@extends('layouts.frontui')
@section('content')

<div class="section">
  @foreach ($camaras->chunk(3) as $row)
          <div class="row">
            @foreach ($row as $camara)
                <div class="col m4 center-align">
                  <a href="{{ url('/camara/'. hashid()->encode($camara->user->id)) }}">
                    
                    <div class="camarawrap">

                    <div class="imagen">
                      <img src="{{asset('storage').'/'.$camara->user->dato->foto_perfil}}" class="imgcam responsive-img">

                        <div class="valign-wrapper hover-name"> 
                
                <h4 class="center-align">{{title_case($camara->user->name)}}</h4>
            
                      </div>
                    </div>
 
                   
                   
                    </div>

                  </a>
                </div>
            @endforeach
          </div>
        @endforeach
</div>

         {{ $camaras->links() }}

@include('includes.tendencias')

@endsection
  