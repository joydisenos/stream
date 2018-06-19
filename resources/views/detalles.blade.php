@extends('layouts.frontui')
@section('content')

<div id="index-banner" class="parallax-container">
    <div class="section no-pad-bot">
      <div class="container">
        <br><br>
        <h1 class="header white-text text-lighten-2">{{title_case($user->name)}}</h1>
     
        <br><br>

      </div>
    </div>
    <div class="parallax"><img src="{{asset('storage').'/'.$user->dato->foto_perfil}}" alt="Perfil"></div>
  </div>


 

  <div class="container">
  	 @if(count($user->foto->where('publico','=',1)))
     
      @foreach ($user->foto->where('publico','=',1)->chunk(3) as $row)
    <div class="row">
      @foreach ($row as $foto)
      <div class="col m4 s12">
        <div class="imagen">
          <img src="{{asset('storage').'/'.$foto->url}}" class="responsive-img materialboxed" alt="">
        </div>
      </div>
      @endforeach
    </div>
    @endforeach
      @else
       <h3>El usuario {{$user->name}} aún no tiene fotos</h3>
      @endif
  </div>


  

  @if($user->dato->citas == 1)
  <div class="container">
    <div class="section">

      <div class="row">
        <div class="col s12 center">
          <h3><i class="mdi-content-send brown-text"></i></h3>
          <h4>Te gustaría agendar una cita?</h4>
          <p class="left-align light">{{$user->dato->detalles_cita}}</p>
        </div>
      </div>

    </div>
  </div>
  @endif


 


@endsection
