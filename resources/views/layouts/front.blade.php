<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> @yield('titulo') VIPescortsCR </title>
</head>
<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('css/style2.css')}}">

<body>
    <div class="header1">
        <div class="container">
        	<div class="row">
        		<div class="col">
        			<link rel="stylesheet" href="#">link1</link>
        		</div>
        		<div class="col">
        			<link rel="stylesheet" href="#">link1</link>
        		</div>
        		<div class="col">
        			<link rel="stylesheet" href="#">link1</link>
        		</div>
        		<div class="col">
        			<link rel="stylesheet" href="#">link1</link>
        		</div>
        	</div>
        </div>
    </div>

    

	<nav class="navbar navbar-expand-lg navbar-light bg-gray">
<div class="container">
    	      <a class="navbar-brand" href="{{url('/')}}">VIPescortsCR</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

      <div class="collapse navbar-collapse d-lg-flex justify-content-between" id="navbarSupportedContent">
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
            <button class="tag-btn" type="submit">Buscar</button>
          </form>

            <ul class="navbar-nav">
                  


            @guest
                            <li class="nav-item"><a data-toggle="modal" data-target="#loginmodal" href="#" class="nav-link">Ingresar</a></li>
                            <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Registrate</a></li>
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu nav-item" aria-labelledby="navbarDropdown">
                                    
                                    @hasanyrole('dev|admin|superadmin')

                                    <a href="{{url('/scaffold-dashboard')}}" class="dropdown-item nav-link">Panel de Control</a>
                                        
                                    @endhasanyrole
                                    <a href="{{url('/usuario')}}" class="dropdown-item nav-link">Perfil</a>
                                        <a class="dropdown-item nav-link" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Cerrar
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    
                                </div>
                            </li>
                        @endguest


                  <li class="nav-item">
                    <a class="nav-link" href="#">Videos <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Categorías</a>
                  </li>

                  
            </ul>
        
      </div>
</div>
</nav>

   <div class="page">
        @yield('content')
   </div>

  
  



  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-3">Contacto</div>
        <div class="col-md-3">Términos Legales</div>
        <div class="col-md-3">Anuncios</div>
        <div class="col-md-3">Tags Populares</div>
      </div>
      
        <div class="copy">
          <p>copyrights - 2018, Todos los <span class="colorazul">derechos reservados</span></p>
        </div>
     
    </div>
  </footer>


  

                    <!-- Modal -->
<div class="modal fade" id="loginmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-gray">
        <h5 class="modal-title" id="exampleModalLabel">Ingreso</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Email</label>

                            <div class="">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Contraseña</label>

                            <div class="">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Olvidaste tu contraseña?
                                </a>
                            </div>
                        </div>
                   


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">
                                    Ingresar
                                </button>
      </div>

       </form>
    </div>
  </div>
</div>



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
</body>

</html>