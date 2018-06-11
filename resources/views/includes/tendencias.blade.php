<div class="tendencias">
    <div class="container">
      <h4 class="titulo-tendencia">Últimas cámaras registradas</h4>
      <div class="row">
        <div class="col m4">
          <ul>
              @foreach ($ultimas as $ultima)
              <li><a class="btn-tendencia" href="{{ url('/camara/'. hashid()->encode($ultima->id)) }}">{{title_case($ultima->name)}}</a></li>
              @endforeach
          </ul>
        </div>
        <div class="col m4">
          <ul>

            @foreach ($mujeres as $mujer)
              <li><a class="btn-tendencia" href="{{ url('/camara/'. hashid()->encode($mujer->user->id)) }}">{{title_case($mujer->user->name)}}</a></li>
            @endforeach
              
          </ul>
        </div>
        <div class="col m4">
          <ul>
              @foreach ($hombres as $hombre)
              <li><a class="btn-tendencia" href="{{ url('/camara/'. hashid()->encode($hombre->user->id)) }}">{{title_case($hombre->user->name)}}</a></li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  </div>