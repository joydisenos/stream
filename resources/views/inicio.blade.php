@extends('layouts.frontui')
@section('content')

<div class="section">
	@foreach ($camaras->chunk(3) as $row)
          <div class="row">
            @foreach ($row as $camara)
                <div class="col m4 s12 center-align">
                  <a href="{{ url('/camara/'. hashid()->encode($camara->user->id)) }}">
                    
                    <div class="camarawrap">

                    <div class="imagen">
                      <img src="{{asset('storage').'/'.$camara->foto_perfil}}" class="imgcam responsive-img">

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

@if (Cookie::get('advertencia') == null)

<!-- Modal Structure -->
 <div id="terminos" class="modal">
  <h6>Advertencias antes de continuar</h6>
<ul>
  <li>Tengo más de 18 años.</li>
  <li>No se permite ningún tipo de anuncio que contenga referencias a prestaciones sexuales pagas.</li>
  <li>No se pueden poner imágenes de tipo pornográfico que contengan órganos genitales visibles.</li>
  <li>La inclusión de material pornográfico infantil comportará la señalación inmediata de los datos de acceso del usuario a las autoridades competentes, con el fin de indentificar a los responsables.</li>
  <li>Publicando un anuncio en VIP Escorts CR el usuario certifica que tiene pleno derecho sobre los contenidos, además, que las imágenes que incluye son de personas mayores de edad que han dado su consentimiento para la publicación de las mismas.</li>
</ul>

<p><small>Al presionar "Aceptar", usted reconoce que es un adulto y exime a los prestadores del servicio, propietarios y creadores de VIP Escorts CR de la responsabilidad por los contenidos del anuncio y del utilizo que hace de la sección.</small></p>



  <a href="#" rel="modal:close" class="btn blue">Aceptar</a>
</div>
    
@else


    
@endif


@endsection
@section('scripts')
@if (Cookie::get('advertencia') == null)

<script>
  $(document).ready(function(){
    $("#terminos").modal({
    fadeDuration: 100,
    });
  });
</script>
    
@else

@endif
<style>
  .modal a.close-modal{
    display: none;
  }
</style>
@endsection