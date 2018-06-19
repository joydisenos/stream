<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	
	<title>VIP Escorts CR @yield('titulo')</title>
	
	
	
	 <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="{{asset('materialize/css/materialize.min.css')}}">
    <link rel="stylesheet" href="{{asset('dropzone/dropzone.min.css')}}">

    <link rel="stylesheet" href="{{asset('/css/estiloui.css')}}">


</head>
<body>


<header>

	<nav class="blue darken-4">
    <div class="nav-wrapper">
      <a href="{{url('/')}}" class="brand-logo">
      	<img width="120"  src="{{asset('/storage/logo-vipescortscr-blanco.png')}}" class="logo-pri" alt="logo vipescortscr">
      </a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      

      <ul class="right hide-on-med-and-down">    
        <li><a href="{{url('filtrar/mujer')}}">Mujeres</a></li>
        <li><a href="{{url('filtrar/hombre')}}">Hombres</a></li>
        <li><a href="{{url('filtrar/pareja')}}">Parejas</a></li>
        <li><a href="{{url('filtrar/trans')}}">Trans</a></li>
        @guest
      
        <li><a href="{{route('login')}}">Iniciar Sesión</a></li>
        <li><a href="{{route('register')}}">Registro</a></li>
        
      
      @else
      
      	<li class="white">
          <a href="{{url('usuario')}}" class="blue-text text-darken-4 z-depth-2"> 
          @if(Auth::user()->dato->sexo == 'hombre')
          Bienvenido,
          @elseif(Auth::user()->dato->sexo == 'mujer')
          Bienvenida,
          @elseif(Auth::user()->dato->sexo == 'pareja')
          Bienvenidos,
          @else
          Bienvenido,
          @endif
           {{title_case(Auth::user()->name)}}</a>
        </li>
         <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Cerrar Sesión
                                        </a>
        </li>
      </ul>
      @endguest
    </div>
  </nav>

  <ul class="sidenav" id="mobile-demo">
        @guest
        <li><a href="{{route('login')}}">Iniciar Sesión</a></li>
        <li><a href="{{route('register')}}">Registro</a></li>
        @else
        <li>
          <div class="user-view">
            <div class="background">
              <img src="{{asset('storage').'/'.Auth::user()->dato->foto_perfil}}">
            </div>
            
            
            <a href="#name"><span class="white-text name">{{title_case(Auth::user()->name)}}</span></a>
            <a href="#email"><span class="white-text email">{{title_case(Auth::user()->email)}}</span></a>
          </div>
        </li>
        <li><a href="{{url('/usuario')}}">Zona de Usuario</a></li>
        <li><a href="{{url('/comprar')}}">Obtener Créditos</a></li>
        <li><a href="{{url('/movimientos')}}">Historial de Movimientos</a></li>
        <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Cerrar Sesión
                                        </a>
        </li>
        @endguest
        <hr>
        <li><a href="{{url('filtrar/mujer')}}">Mujeres</a></li>
        <li><a href="{{url('filtrar/hombre')}}">Hombres</a></li>
        <li><a href="{{url('filtrar/pareja')}}">Parejas</a></li>
        <li><a href="{{url('filtrar/trans')}}">Trans</a></li>
  </ul>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
</form>

</header>

		<div class="contenedor" style="min-height: 90vh;">
    @yield('content')  
    </div>


		@include('includes.footer')
	

	

<!-- Compiled and minified JavaScript -->
<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('materialize/js/materialize.min.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>

<script src="{{asset('dropzone/dropzone.min.js')}}"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />

<script>
	$(document).ready(function(){

    $('.sidenav').sidenav();
    $('.materialboxed').materialbox();
    $('.tabs').tabs();
    $('.tap-target').tapTarget();
    $('select').formSelect();
    $('.tooltipped').tooltip();
    $('.parallax').parallax();

  });
</script>
@yield('scripts')



</body>

</html>
