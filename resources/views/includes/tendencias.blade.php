<div class="tendencias">
    <div class="container">
      <h4 class="titulo-tendencia">Últimas cámaras registradas</h4>
      <div class="row">
        <div class="col">
          <ul>
              @foreach ($ultimas as $ultima)
              <li><a class="btn-tendencia" href="{{ url('/camara/'. hashid()->encode($ultima->id)) }}">{{$ultima->name}}</a></li>
              @endforeach
          </ul>
        </div>
        <div class="col">
          <ul>

            @foreach ($mujeres as $mujer)
              <li><a class="btn-tendencia" href="{{ url('/camara/'. hashid()->encode($mujer->user->id)) }}">{{$mujer->user->name}}</a></li>
            @endforeach
              
          </ul>
        </div>
        <div class="col">
          <ul>
              @foreach ($hombres as $hombre)
              <li><a class="btn-tendencia" href="{{ url('/camara/'. hashid()->encode($hombre->user->id)) }}">{{$hombre->user->name}}</a></li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  </div>