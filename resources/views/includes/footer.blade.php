 <footer class="page-footer blue darken-4">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">VIP Escort CR</h5>
          <p class="grey-text text-lighten-4">Todos los derechos reservados VIP Escort CR 2018</p>


        </div>
        <div class="col l6 s12">
          <h5 class="white-text">Categorías</h5>
          <ul>
       <?php 
        $categoriaslista = App\Filtro::where('estatus','=',1)->get();
        ?>

        @foreach($categoriaslista as $cat)

        <?php $conteo = App\Filtro_usuario::where('filtro_id','=',$cat->id)->where('estatus','=', 1)->count(); ?>

        @if($conteo > 0)
        <li><a href="{{url('categoria').'/'.$cat->id}}" class="white-text">{{$cat->nombre}}</a></li>
        @endif

        @endforeach
        
          </ul>
        </div>
       
      </div>
    </div>
   
  </footer>