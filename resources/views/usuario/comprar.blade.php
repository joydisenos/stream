@extends('layouts.frontui')

@section('titulo')

Zona de Usuarios

@endsection

@section('content')
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<section class="container">
 <div class="gray text-center">
    <h3>
        Comprar Créditos
    </h3>
   </div>

   @if(count($creditos))
   @foreach($creditos->chunk(2) as $row)
   <div class="row">
       @foreach($row as $credito)
       <div class="col s12 m6">
           <div class="card">
            <div class="card-image waves-effect waves-block waves-light">
              <img class="activator" src="{{asset('/storage/logo.svg')}}">
            </div>
            <div class="card-content">
              <span class="card-title activator grey-text text-darken-4"><strong>{{$credito->cantidad}} Créditos por USD{{$credito->valor}}</strong><i class="material-icons right">more_vert</i></span>
              <p><div id="paypal-button-container{{$credito->id}}"></div></p>
            </div>
            <div class="card-reveal">
              <span class="card-title grey-text text-darken-4">{{$credito->nombre}}<i class="material-icons right">close</i></span>
              <p>{{$credito->nombre}}</p>
              <p>{{$credito->descripcion}}</p>
            </div>
          </div>
        </div>
        <script>

            var valortotal = {{$credito->valor}};
              // Render the PayPal button

    paypal.Button.render({

        // Set your environment

        env: 'sandbox', // sandbox | production

        // Specify the style of the button

        style: {
            size:  'medium', // small | medium | large | responsive
            shape: 'rect',  // pill | rect
            tagline: false
        },

        funding: {
            allowed: [ paypal.FUNDING.CREDIT ]
        },

        // PayPal Client IDs - replace with your own
        // Create a PayPal app: https://developer.paypal.com/developer/applications/create

        client: {
            sandbox:    'AZDxjDScFpQtjWTOUtWKbyN_bDt4OgqaF4eYXlewfBP4-8aqX3PiV8e1GWU6liB2CUXlkA59kJXE7M6R',
            production:  '{{$datos->id_paypal}}'
        },

        // Wait for the PayPal button to be clicked

        payment: function(data, actions) {

            // Set up a payment and make credit the landing page

            return actions.payment.create({
                payment: {
                    transactions: [
                        {
                            amount: { total: valortotal, currency: 'USD' }
                        }
                    ]
                }
            });
        },

        // Wait for the payment to be authorized by the customer

        onAuthorize: function(data, actions) {
            return actions.payment.execute().then(function() {
                window.alert('Pago Completado!');
            });
        }

    }, '#paypal-button-container{{$credito->id}}');
        </script>
       @endforeach
   </div>
   @endforeach
   @endif
    
    <form method = 'POST' action = '{!!url("comprar")!!}'>
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <input id="user_id" name = "user_id" type="hidden" class="form-control">

       <div class="row">
       <div class="col m6">
        <div class="form-group">
            <label for="cantidad">Cantidad de Créditos a Solicitar</label>
            <input id="cantidad" name = "cantidad" type="number" class="form-control" required>
        </div>
        </div>
        <div class="col m6">
            <h6 >
                Valor (USD) <span id="precio"></span>
            </h6>

        </div>
        </div>
      
           
            <input id="transaccion" name = "transaccion" type="hidden" class="form-control" value="compra">

<h3>Transferencia</h3>
        <div class="row">
    <form class="col s12">
      <div class="row">
        <div class="input-field col s12">
          <textarea class="materialize-textarea" id="numero_trans" name = "numero_trans"  required></textarea>
          <label for="numero_trans">Número de Transacción o Detalles</label>
        </div>
      </div>
    </form>
  </div>
        <button class = 'waves-effect blue waves-light btn btn-success' type ='submit'> <i class="fa fa-floppy-o"></i> Enviar Comprobante</button>
    </form>
</section>

<div class="container">
    <div class="row">
        <div class="col s12">
            <h3>Cancelar con Paypal</h3>

<div id="paypal-button-container"></div>
<hr>
        </div>
    </div>
</div>
@endsection
@section('scripts')

<script>
    var precio = {{$datos->valor_usd}};
    var value = $('#cantidad').val();
    $('#precio').text(value*precio);

    $('#cantidad').change(function(){

    var precio = {{$datos->valor_usd}};
    var value = $('#cantidad').val();

    total = value*precio;

    $('#precio').text(total);
  
    });

 
    // Render the PayPal button

    paypal.Button.render({

        // Set your environment

        env: 'sandbox', // sandbox | production

        // Specify the style of the button

        style: {
            size:  'medium', // small | medium | large | responsive
            shape: 'rect',  // pill | rect
            tagline: false
        },

        funding: {
            allowed: [ paypal.FUNDING.CREDIT ]
        },

        // PayPal Client IDs - replace with your own
        // Create a PayPal app: https://developer.paypal.com/developer/applications/create

        client: {
            sandbox:    'AZDxjDScFpQtjWTOUtWKbyN_bDt4OgqaF4eYXlewfBP4-8aqX3PiV8e1GWU6liB2CUXlkA59kJXE7M6R',
            production:  '{{$datos->id_paypal}}'
        },

        // Wait for the PayPal button to be clicked

        payment: function(data, actions) {

            // Set up a payment and make credit the landing page

            return actions.payment.create({
                payment: {
                    transactions: [
                        {
                            amount: { total: total, currency: 'USD' }
                        }
                    ]
                }
            });
        },

        // Wait for the payment to be authorized by the customer

        onAuthorize: function(data, actions) {
            return actions.payment.execute().then(function() {
                window.alert('Pago Completado!');
            });
        }

    }, '#paypal-button-container');
</script>
@endsection