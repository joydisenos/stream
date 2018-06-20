@extends('scaffold-interface.layouts.app')
@section('title','Configuración')
@section('content')

<section class="content">
    <h1>
        Configuración
    </h1>

    <table class = 'table table-bordered'>
        <thead>
            <th>Campo</th>
            <th>Valor</th>
        </thead>
        <form method = 'POST' action = '{!! url("config")!!}'> 
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <tbody>
            <tr>
                <td> <b>Políticas y condiciones de uso</b> </td>
                <td> <textarea class="form-control" name="politicas" id="politicas" cols="30" rows="10">{{$datos->politicas}}</textarea> </td>
            </tr>
            <tr>
                <td> <b>Valor Crédito (USD)</b> </td>
                <td> <input class="form-control" type="number" step="0.05" name="valor_usd" placeholder="Valor del crédito USD" value="{{$datos->valor_usd}}"> </td>
            </tr>

            <tr>
                <td> <b>Email Admin</b> </td>
                <td> <input class="form-control" type="email"  name="email" placeholder="admin@admin.com" value="{{$datos->email}}"> </td>
            </tr>

            <tr>
                <td> <b>Id Cliente Paypal</b> </td>
                <td> <input class="form-control" type="text" name="id_paypal" placeholder="Número Id Paypal" value="{{$datos->id_paypal}}"> </td>
            </tr>

            <tr>
                <td></td>
                <td><button type="submit" class="btn btn-primary">Actualizar</button></td>
            </tr>

           
        </tbody>
        </form>
    </table>

</section>
@endsection