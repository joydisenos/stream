@extends('layouts.front')

@section('content')


<div class="container">
	
	<div class="row">
		<div class="col-md-8">
			
<div class="embed-responsive embed-responsive-4by3">
  <video class="video embed-responsive-item" id="camera-stream"></video>
</div>

		</div>

		<div class="col-md-4">
			
		</div>
	</div>

	<div class="controles-chat">
		
	<div class="row">
		<div class="col-md-8">
			<div class="d-flex justify-content-between">
			<button class="btn btn-primary">Seguir</button>
			<button class="btn btn-outline-primary">Me gusta</button>
			<button class="btn btn-primary">Iniciar Show Privado</button>
			<button class="btn btn-primary">Comprar Créditos</button>
			</div>
		</div>
		<div class="col-md-4">
			<input type="text" class="form-control" placeholder="Escriba aquí...">
		</div>
	</div>
	</div>

</div>



<div class="container">

		
	<div class="bg-gray">
		
<ul class="nav nav-tabs" id="myTab" role="tablist">

	  
	  <li class="nav-item">
	    <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Perfil</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" id="fotos-tab" data-toggle="tab" href="#fotos" role="tab" aria-controls="fotos" aria-selected="false">Fotos</a>
	  </li>

	</ul>

	<div class="tab-content" id="myTabContent">
	 
	  <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">

		
<div class="row">
	<div class="col">
		
		<table class="table table-hover">
			
			
			<tr>
				<td>Año de Nacimiento:</td>
				<td>{{$user->dato->nacimiento_ano}}</td>
			</tr>
			<tr>
				<td>Sexo:</td>
				<td>{{$user->dato->sexo}}</td>
			</tr>
			<tr>
				<td>Localidad:</td>
				<td>{{$user->dato->localidad}}</td>
			</tr>
			<tr>
				<td>Interés:</td>
				<td>{{$user->dato->interes}}</td>
			</tr>
		</table>
	</div>
	<div class="col">
			<h3>Biografía</h3>
			<p>{{$user->dato->biografia}}</p>
	</div>
</div>
	

	  </div>
	  <div class="tab-pane fade" id="fotos" role="tabpanel" aria-labelledby="fotos-tab">

		@if(!$user->fotos)
		<h2>No se han agregado Fotografías de este perfil</h2>
		@endif

	  </div>
	</div>


	</div>






	</div>
	 
	  


<script>
	window.onload = function() {

  
  navigator.getUserMedia = (navigator.getUserMedia ||
                            navigator.webkitGetUserMedia ||
                            navigator.mozGetUserMedia || 
                            navigator.msGetUserMedia);

}


if (navigator.getUserMedia) {
  
  navigator.getUserMedia(
   
    {
      video: true
    },

    
    function(localMediaStream) {


var vid = document.getElementById('camera-stream');


vid.src = window.URL.createObjectURL(localMediaStream);
    },

    
    function(err) {
      
      console.log('The following error occurred when trying to use getUserMedia: ' + err);
    }
  );

} else {
  alert('Sorry, your browser does not support getUserMedia');
}

</script>

@endsection