@extends('layouts.front')

@section('content')

<div class="tags animated flash">
        <div class="container">
          
          <div class="row">
          <a class="tag-btn" href=" {{url('/filtrar/mujer')}} ">Mujeres</a>
          <a class="tag-btn" href=" {{url('/filtrar/hombre')}} ">Hombres</a>
          <a class="tag-btn" href=" {{url('/filtrar/pareja')}} ">Parejas</a>
          <a class="tag-btn" href=" {{url('/filtrar/trans')}} ">Trans</a>
          <a class="tag-btn" href=" {{url('/')}} ">Todos</a>
          
          </div>

        </div>
    </div>

    <div class="titulo">
      <div class="container">
        <div class="row">
          <div class="col">
            <span class="titulo1">
              Shows en Vivo
            </span>
          </div>
          <div class="col">
            <span class="titulo2">
              Ofertas y promociones
            </span>
          </div>
          <div class="col">
            <span class="titulo3">
              <a href=" {{url('/escorts')}} ">Elige tu Escort</a>
            </span>
          </div>
        </div>
      </div>
    </div>

    <!-- Zona de Videos -->

    <div class="elementos">
      <div class="container">
        
        <!-- Comienzo del Loop -->

        @foreach ($camaras->chunk(3) as $row)
          <div class="row">
            @foreach ($row as $camara)
                <div class="col-md-4">
                  <a href="{{ url('/camara/'. hashid()->encode($camara->id)) }}">
                    
                    <div class="camarawrap">
                      <div class="imagen">
                      <img src="{{asset('storage').'/'.$camara->dato->foto_perfil}}" class="imgcam">
                    </div>
                    <div class="titulo-img">{{ $camara->name }}</div>
                    </div>

                  </a>
                </div>
            @endforeach
          </div>
        @endforeach


        

        
      <!-- Fin del Loop -->
      </div>
    </div>

    <!-- Fin zona de videos -->



    <div class="paginador">
     <div class="container">
       <div class="row">
         <div class="numeros">

          {{ $camaras->links() }}

            
         </div>
       </div>
     </div>
    </div>

    @include('includes.tendencias')

@endsection