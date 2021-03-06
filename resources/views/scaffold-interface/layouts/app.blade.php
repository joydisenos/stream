<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>@yield('title')</title>
		<!-- Tell the browser to be responsive to screen width -->
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<!-- Bootstrap 3.3.7 -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
		<!-- Ionicons -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
		<!-- Theme style -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.5/css/AdminLTE.min.css">
		<!-- AdminLTE Skins. Choose a skin from the css/skins
		folder instead of downloading all of them to reduce the load. -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.5/css/skins/_all-skins.min.css">
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body class="hold-transition skin-blue sidebar-mini">
		<div class="wrapper">
			<header class="main-header">
				<!-- Logo -->
				<a href="{{url('/')}}" class="logo">
					<!-- mini logo for sidebar mini 50x50 pixels -->
					<span class="logo-mini"><b>P</b>C</span>
					<!-- logo for regular state and mobile devices -->
					<span class="logo-lg"><b>Panel VIPescortsCR</b></span>
				</a>
				<!-- Header Navbar: style can be found in header.less -->
				<nav class="navbar navbar-static-top">
					<!-- Sidebar toggle button-->
					<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
						<span class="sr-only">Ocultar Menú</span>
					</a>
					<div class="navbar-custom-menu">
						<ul class="nav navbar-nav">
							<!-- Notification Navbar List-->
							<?php 
								$notificacion1 = App\Dato::where('afiliado','=',1)->get();
								$notificacion2 = App\Movimiento::where('estado','=','1')->orderBy('created_at','DESC')->get();
								$notificacion3 = App\Pago::where('estatus','=',1)->get();
								$notificaciones = count($notificacion1) + count($notificacion2) + count($notificacion3);
							 ?>
							@if($notificaciones > 0)
							<li class="dropdown notifications-menu">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<i class="fa fa-bell-o"></i>
									<span class="label notification-label">{{$notificaciones}}</span>
								</a>
								<ul class="dropdown-menu">
									<li class="header">Notificaciones</li>
									<li>
										<!-- inner menu: contains the actual data -->
										<ul class="menu notification-menu">

											@foreach($notificacion1 as $notificacion)

											<li> <a href="{{url('/afiliados')}}">Solicitud para afiliar de {{title_case($notificacion->user->name)}}</a> </li>

											@endforeach

											@foreach($notificacion2 as $notificacion)

											<li> <a href="{{url('/movimiento')}}">pago realizado de {{title_case($notificacion->user->name)}}</a> </li>

											@endforeach

											@foreach($notificacion3 as $notificacion)

											<li> <a href="{{url('/pagos')}}">Cancelado a {{title_case($notificacion->afiliado->name)}} <strong>{{$notificacion->creditos}} Créditos</strong></a> </li>

											@endforeach

										</ul>
									</li>
									<li class="footer"><a href="#">Ver todas</a></li>
								</ul>
							</li>
							@endif
							<!-- END notification navbar list-->
							<li class="dropdown user user-menu">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<img src="http://ahloman.net/wp-content/uploads/2013/06/user.jpg" class="user-image" alt="User Image">
									<span class="hidden-xs">{{Auth::user()->name}}</span>
								</a>
								<ul class="dropdown-menu">
									<!-- User image -->
									<li class="user-header">
										<img src="http://ahloman.net/wp-content/uploads/2013/06/user.jpg" class="img-circle" alt="User Image">
										<p>
											{{Auth::user()->name}}
										</p>
									</li>
									<!-- Menu Footer-->
									<li class="user-footer">
										<div class="pull-right">
											<a href="{{url('logout')}}" class="btn btn-default btn-flat"
												onclick="event.preventDefault();
											document.getElementById('logout-form').submit();">Sign out</a>
											<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
												{{ csrf_field() }}
											</form>
										</div>
									</li>
								</ul>
							</li>
						</ul>
					</div>
				</nav>
			</header>
			<aside class="main-sidebar">
				<!-- sidebar: style can be found in sidebar.less -->
				<section class="sidebar">
					
					<!-- sidebar menu: : style can be found in sidebar.less -->
					<ul class="sidebar-menu">
						<li class="header">Panel Principal</li>
						<li class="active treeview">
							<a href="{{url('dashboard')}}">
								<i class="fa fa-dashboard"></i> <span>General</span></i>
							</a>
						</li>
						<li class="header">Administración</li>
						<li class="treeview"><a href="{{url('/scaffold-users')}}"><i class="fa fa-users"></i> <span>Usuarios</span></a></li>
						<li class="treeview"><a href="{{url('/filtro')}}"><i class="fa fa-sort-amount-asc"></i> <span>Categorias</span></a></li>
						<li class="treeview"><a href="{{url('/scaffold-roles')}}"><i class="fa fa-user-plus"></i> <span>Roles</span></a></li>
						<li class="treeview"><a href="{{url('/config')}}"><i class="fa fa-user-plus"></i> <span>Configuración</span></a></li>
						<li class="treeview"><a href="{{url('/credito')}}"><i class="fa fa-user-plus"></i> <span>Promociones</span></a></li>
						
						<!--
							<li class="treeview"><a href="{{url('/scaffold-permissions')}}"><i class="fa fa-key"></i> <span>Permisos</span></a></li>
						-->
								<!-- SCAFFOLD -->
						<!-- 	
						<li class="header">Scaffold Interface</li>
						<li class="treeview"><a href="{{url('/scaffold')}}"><i class="fa fa-desktop"></i> <span>Scaffold Interface</span></a></li>
						-->

						<li class="header">Perfil</li>
						<li class="treeview"><a href="{{url('/perfil')}}"><i class="fa fa-th-list"></i> <span>Perfil</span></a></li>
						<li class="treeview"><a href="{{url('/dato')}}"><i class="fa fa-tasks"></i> <span>Todos los perfiles</span></a></li>
						<li class="treeview"><a href="{{url('/afiliados')}}"><i class="fa fa-tags"></i> <span>Afiliados</span></a></li>
						<li class="treeview"><a href="{{url('/foto')}}"><i class="fa fa-clone"></i> <span>Fotos</span></a></li>
						<li class="header">Historial</li>
						<li class="treeview"><a href="{{url('/billetera')}}"><i class="fa fa-dollar"></i> <span>Billeteras</span></a></li>
						<li class="treeview"><a href="{{url('/citas')}}"><i class="fa fa-comments-o"></i> <span>Citas</span></a></li>
						<li class="treeview"><a href="{{url('/movimiento')}}"><i class="fa fa-exchange"></i> <span>Depósitos</span></a></li>
						<li class="treeview"><a href="{{url('/pagos')}}"><i class="fa fa-money"></i> <span>Pagos</span></a></li>
						
					</ul>
				</section>
				<!-- /.sidebar -->
			</aside>
			<div class="content-wrapper">
				@yield('content')
			</div>
		</div>
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class = 'AjaxisModal'>
			</div>
		</div>
		<!-- Compiled and minified JavaScript -->
		<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.5/js/app.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.5/js/demo.js"></script>
		<script> var baseURL = "{{ URL::to('/') }}"</script>
		<script src = "{{URL::asset('js/AjaxisBootstrap.js') }}"></script>
		<script src = "{{URL::asset('js/scaffold-interface-js/customA.js') }}"></script>
		<script src="https://js.pusher.com/3.2/pusher.min.js"></script>
		<script>
		// pusher log to console.
		Pusher.logToConsole = true;
		// here is pusher client side code.
		var pusher = new Pusher("{{env("PUSHER_APP_KEY")}}", {
		encrypted: true
		});
		var channel = pusher.subscribe('test-channel');
		channel.bind('test-event', function(data) {
		// display message coming from server on dashboard Notification Navbar List.
		$('.notification-label').addClass('label-warning');
		$('.notification-menu').append(
			'<li>\
				<a href="#">\
					<i class="fa fa-users text-aqua"></i> '+data.message+'\
				</a>\
			</li>'
			);
		});



   $('#filtro').keyup(function () {
      var rex = new RegExp($(this).val(), 'i');
        $('#registros tr').hide();
        $('#registros tr').filter(function () {
            return rex.test($(this).text());
        }).show();

        });


		</script>
	</body>
</html>
