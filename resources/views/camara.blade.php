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
              <a href="#" class="waves-effect blue waves-light btn">Show Privado</a>
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
		
		
		</div>
	</div>


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