@extends('layouts.frontui')

@section('content')


<style>
	#otEmbedContainer{
		height:500px;
	}
</style>



  <div class="row">
	  <div class="col m8 s12">
		
      <div id="otEmbedContainer"></div> 
      <script src="https://tokbox.com/embed/embed/ot-embed.js?embedId=d7aad0d1-860e-49cb-a156-c560d82194ab&room={{hashid()->encode($user->id)}}"></script>

		</div>

		<div class="col m4 s12">
			<div class="frame">
         <ul></ul>

            <div>
                <div class="msj-rta macro">                        
                    <div class="text text-r">
                        <input class="mytext" placeholder="Escribe un mensaje"/>
                    </div> 

                </div>

            </div>
         
      </div>
		</div>

	</div>

		
	<div class="row">
		<div class="col m8 s12">

				<div class="row">
            <div class="col m3 s12">
              @guest
              <a href="{{url('login')}}" class="waves-effect blue waves-light btn">Iniciar Sesión</a>
              @else
              @if( Auth::user()->id == $user->id )
              <a href="#" class="waves-effect blue waves-light btn">Show Privado</a>
              @else
              <a href="{{url('privado/ingresar').'/'.hashid()->encode($user->id)}}" class="waves-effect blue waves-light btn">Ingresar Privado</a>
              @endif
              @endguest
            </div>
        
          
            <div class="col m3 s12">
              <a href="#" class="waves-effect blue waves-light btn">Valorar</a>
            </div>

            <div class="col m3 s12">
              <a href="{{url('comprar')}}" class="waves-effect blue darken-4 waves-light btn">Créditos</a>
            </div>
            
            <div class="col m3 s12">
              <a href="{{url('detalles').'/'.hashid()->encode($user->id)}}" class="waves-effect blue waves-light btn">Ver mas</a>    
            </div>
			   </div>

			</div>
		
		<div class="col m4">
		@guest
    @else
     @if($user->dato->citas == 1) 
      <a class="btn-floating btn-large red pulse left" onclick="$('.tap-target').tapTarget('open')"><i class="material-icons">assignment_ind</i></a>
      @else
      @endif
    @endguest
		</div>
	</div>


@guest
@else
 @if($user->dato->citas == 1) 
  <div class="fix-btn" style="position:fixed;right:20px;bottom:10px;z-index: 1000;">
     <!-- Element Showed -->
  <a id="assignment_ind" class="waves-effect waves-light btn-large btn-floating red pulse z-depth-3" onclick="$('.tap-target').tapTarget('open')"><i class="material-icons">assignment_ind</i></a>
  <!-- Tap Target Structure -->
  <div class="tap-target white-text" data-target="assignment_ind">
    <div class="tap-target-content">
      <h5>Hola, {{title_case(Auth::user()->name)}}</h5>
      <p>Te gustaría tener una cita con {{title_case($user->name)}}? @if($user->dato->sexo == 'hombre') El @elseif($user->dato->sexo == 'mujer') Ella @elseif($user->dato->sexo == 'pareja') Ellos @else @endif se encuentra disponible para agendar una cita</p>
      <a href="#cita-solicitar" class="waves-effect waves-dark btn white red-text modal-trigger" onclick="$('#cita-solicitar').modal();">Solicitar</a>
    </div>
  </div>
  </div>

  <!-- Modal Structure -->
  <div id="cita-solicitar" class="modal">
    <div class="modal-content">
      <h4>Solicitar Cita</h4>
      <table>
        <thead>
          <th>Precio por Horas (Créditos)</th>
          <th>Precio por Día (Créditos)</th>
        </thead>
        <tr>
          <td>{{$user->dato->precio_cita_hora / $datos->valor_usd}}</td>
          <td>{{$user->dato->precio_cita_dia / $datos->valor_usd}}</td>
        </tr>
      </table>
      <p>{{$user->dato->detalles_cita}}</p>
    </div>
    <form method="post" action="{{ url('solicitarcita') }}">
       <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
       <input type="hidden" name="user_id" value="{{$user->id}}">
       <input type="hidden" name="email" value="{{Auth::user()->email}}">
      

      <div class="row">
        <div class="input-field col s6">
          <input type="date" name="detalles[]" class="materialize-textarea" required>
          <label for="textarea1">Fecha</label>
        </div>
        <div class="input-field col s6">
          <input type="time" name="detalles[]" class="materialize-textarea" required>
          <label for="textarea1">Hora</label>
        </div>
      </div>
      
      <div class="row">
        <div class="input-field col s12">
          <textarea id="detalles" name="detalles[]" class="materialize-textarea" required></textarea>
          <label for="textarea1">Observaciones</label>
        </div>
      </div>

     
    
    <div class="modal-footer">
      <button type="submit" class="modal-close waves-effect waves-green btn-flat">Solicitar</button>
      </form>
    </div>
  </div>
  @else
  @endif
@endguest


  <div class="row">
    <div class="col m4 s12">
      <table>
      
      
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
    <div class="col m8 s12">
      @if(count($user->foto->where('publico','=',1)))
      <h6>Galería {{title_case($user->name)}}</h6>
      @foreach ($user->foto->where('publico','=',1)->chunk(3) as $row)
    <div class="row">
      @foreach ($row as $foto)
      <div class="col m4 s12">
        <div class="imagen">
          <img src="{{asset('storage').'/'.$foto->url}}" class="responsive-img materialboxed" alt="">
        </div>
      </div>
      @endforeach
    </div>
    @endforeach
      @else
       <h3>El usuario {{$user->name}} aún no tiene fotos</h3>
      @endif
    </div>
  </div>




@endsection

@section('scripts')
<script>
	var me = {};
me.avatar = "https://lh6.googleusercontent.com/-lr2nyjhhjXw/AAAAAAAAAAI/AAAAAAAARmE/MdtfUmC0M4s/photo.jpg?sz=48";

var you = {};
you.avatar = "https://a11.t26.net/taringa/avatares/9/1/2/F/7/8/Demon_King1/48x48_5C5.jpg";

function formatAMPM(date) {
    var hours = date.getHours();
    var minutes = date.getMinutes();
    var ampm = hours >= 12 ? 'PM' : 'AM';
    hours = hours % 12;
    hours = hours ? hours : 12; // the hour '0' should be '12'
    minutes = minutes < 10 ? '0'+minutes : minutes;
    var strTime = hours + ':' + minutes + ' ' + ampm;
    return strTime;
}            

//-- No use time. It is a javaScript effect.
function insertChat(who, text, time){
    if (time === undefined){
        time = 0;
    }
    var control = "";
    var date = formatAMPM(new Date());
    
    if (who == "me"){
        control = '<li style="width:100%;">' +
                        '<div class="msj macro ">' +
                        '<div class="avatar col s3"><img class="responsive-img circle" src="'+ me.avatar +'" /></div>' +
                            '<div class="text text-l col s9">' +
                                '<p>'+ text +'</p>' +
                                '<p><small>'+date+'</small></p>' +
                            '</div>' +
                        '</div>' +
                    '</li>';                    
    }else{
        control = '<li style="width:100%;">' +
                        '<div class="msj-rta macro">' +
                            '<div class="text text-r col s9">' +
                                '<p>'+text+'</p>' +
                                '<p><small>'+date+'</small></p>' +
                            '</div>' +
                        '<div class="avatar col s3" style="padding:0px 0px 0px 10px !important"><img class="responsive-img circle" src="'+you.avatar+'" /></div>' +                                
                  '</li>';
    }
    setTimeout(
        function(){                        
            $(".frame ul").append(control).scrollTop($(".frame ul").prop('scrollHeight'));
        }, time);
    
}

function resetChat(){
    $(".frame ul").empty();
}

$(".mytext").on("keydown", function(e){
    if (e.which == 13){
        var text = $(this).val();
        if (text !== ""){
            insertChat("me", text);              
            $(this).val('');
        }
    }
});

$('body > div > div > div:nth-child(2) > span').click(function(){
    $(".mytext").trigger({type: 'keydown', which: 13, keyCode: 13});
})

//-- Clear Chat
resetChat();

//-- Print Messages
insertChat("me", "Hola Tom...", 0);  
insertChat("ellos", "hola, Pablo", 1500);
insertChat("me", "Que te gustaría que hicieramos hoy?", 3500);
insertChat("ellos", "Sorpréndeme ;)",7000);
insertChat("me", "Déjame pensar mmmm", 9500);
insertChat("ellos", "D:", 12000); 


 


</script>
@endsection