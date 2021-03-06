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

   @if(count($user->foto->where('publico','=',2)))
     
      <div class="container">
        
      <h5>Quieres ver más fotos por 2 créditos?</h5>

      <a href="{{url('galeria').'/'.hashid()->encode($user->id)}}" class="btn red">Accede aquí</a>

        
      </div>
     
  @endif


  

  @if($user->dato->citas == 1)
  <div class="container">
    <div class="section">

      <div class="row">
        <div class="col s12 center">
          <h3><i class="mdi-content-send brown-text"></i></h3>
          <h4>Te gustaría agendar una cita?</h4>
          @guest
          <p><a href="{{url('login')}}">Inicia sesión</a> o <a href="{{url('register')}}">regístrate para más detalles</a></p>
          @else
          <p class="left-align light">{{$user->dato->detalles_cita}}</p>
          <p>Créditos por hora: {{$preciohorat}} créditos</p>
          <p>Créditos por noche: {{$preciodiat}} créditos</p>
          @endguest
        </div>
      </div>

    </div>
  </div>

@guest
@else
<div class="container">
  <div class="section">
    <div class="row">
      <div class="col s12">
         <form method="post" action="{{ url('solicitarcita') }}">
       <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
       <input type="hidden" name="user_id" value="{{$user->id}}">
       <input type="hidden" name="email" value="{{Auth::user()->email}}">
      

      <div class="row">
        <div class="input-field col s6">
          <input type="date" name="detalles[]" class="materialize-textarea" required>
          <label for="textarea1">Fecha</label>
        </div>
        <div class="input-field col s6">
          <input type="time" name="detalles[]" class="materialize-textarea" required>
          <label for="textarea1">Hora</label>
        </div>
      </div>
      
      <div class="row">
        <div class="input-field col s12">
          <textarea id="detalles" name="detalles[]" class="materialize-textarea" required></textarea>
          <label for="textarea1">Observaciones</label>
        </div>
      </div>

     
    
    <div class="modal-footer">
      <button type="submit" class="modal-close waves-effect waves-green btn-flat">Solicitar</button>
      </form>
      </div>
    </div>
  </div>
</div>
@endguest
@endif
 


@endsection
