@extends('layouts.front')

@section('content')

<div class="tags">
        <div class="container">
          
          <div class="row">
            <button type="button" class="tag-btn">Mujeres</button>
          <button type="button" class="tag-btn">Hombres</button>
          <button type="button" class="tag-btn">Parejas</button>
          <button type="button" class="tag-btn">Trans</button>
          <button type="button" class="tag-btn">Teen</button>
          <button type="button" class="tag-btn"> + </button>
          </div>

        </div>
    </div>

    <div class="titulo">
      <div class="container">
        <div class="row">
          <div class="col">
            <span class="titulo1">
              Título de la página
            </span>
          </div>
          <div class="col">
            <span class="titulo2">
              Ofertas y promociones
            </span>
          </div>
          <div class="col">
            <span class="titulo3">
              Categorías
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
                <div class="col-md-4 ">
                  <a href="{{ url('/camara/'. hashid()->encode($camara->id)) }}">
                    
                    <div class="imagen"></div>
                    <div class="titulo-img">{{ $camara->name }}</div>

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