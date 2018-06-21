<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', 'CamController@index');
Route::get('/filtrar/{filtro}', 'CamController@filtrar');
Route::get('/categoria/{filtro}', 'CamController@categorias');

Route::resource('camara', 'CamController');

Route::get('/detalles/{id}', 'CamController@detalles');

Route::post('/solicitarcita', 'DatoController@citas');




Route::group(['middleware'=> 'auth'],function(){

Route::get('/usuario', 'HomeController@index');
Route::get('/dato/{id}','DatoController@editar');
Route::post('/dato/{id}/actualizar','DatoController@actualizar');
Route::get('/comprar','MovimientoController@comprar');
Route::post('/comprar','MovimientoController@store');

Route::get('/movimientos', 'MovimientoController@listausuario');

Route::get('/usuario/cambiar/{id}/{estatus}', 'FotoController@vision');

Route::get('/afiliar', 'DatoController@afiliar');
Route::post('/afiliar', 'DatoController@afiliar_solicitud');
Route::get('/galeria/{id}', 'CamController@galeria');


});

//abono

Route::group(['middleware'=> 'auth'],function(){
Route::get('/abonar/{id}','BilleteraController@aprobar');
Route::get('/negar/{id}','BilleteraController@negar');
});

//dato Routes
Route::group(['middleware'=> 'auth'],function(){
  Route::resource('dato','\App\Http\Controllers\DatoController');
  Route::post('dato/{id}/update','\App\Http\Controllers\DatoController@update');
  Route::get('dato/{id}/delete','\App\Http\Controllers\DatoController@destroy');
  Route::get('dato/{id}/deleteMsg','\App\Http\Controllers\DatoController@DeleteMsg');
  Route::get('perfil',
  		'DatoController@mostrar');
  Route::get('perfil/{id}',
  	  '\App\Http\Controllers\DatoController@edit');
});

//movimiento Routes
Route::group(['middleware'=> 'auth'],function(){
  Route::resource('movimiento','\App\Http\Controllers\MovimientoController');
  Route::post('movimiento/{id}/update','\App\Http\Controllers\MovimientoController@update');
  Route::get('movimiento/{id}/delete','\App\Http\Controllers\MovimientoController@destroy');
  Route::get('movimiento/{id}/deleteMsg','\App\Http\Controllers\MovimientoController@DeleteMsg');
});
//billetera Routes
Route::group(['middleware'=> 'auth'],function(){
  Route::resource('billetera','\App\Http\Controllers\BilleteraController');
  Route::post('billetera/{id}/update','\App\Http\Controllers\BilleteraController@update');
  Route::get('billetera/{id}/delete','\App\Http\Controllers\BilleteraController@destroy');
  Route::get('billetera/{id}/deleteMsg','\App\Http\Controllers\BilleteraController@DeleteMsg');
});

//foto Routes
Route::group(['middleware'=> 'auth'],function(){
  Route::resource('foto','\App\Http\Controllers\FotoController');
  Route::post('foto/guardar','\App\Http\Controllers\FotoController@store');
  Route::post('foto/{id}/update','\App\Http\Controllers\FotoController@update');
  Route::get('foto/{id}/delete','\App\Http\Controllers\FotoController@destroy');
  Route::get('foto/{id}/deleteMsg','\App\Http\Controllers\FotoController@DeleteMsg');
});


//Afiliados y citas Routes
Route::group(['middleware'=> 'auth'],function(){
  
  Route::get('/afiliados','AdminController@afiliados');
  Route::get('/afiliar/{id}','AdminController@afiliar');
  Route::get('/citas','AdminController@citas');
});

//filtro Routes
Route::group(['middleware'=> 'web'],function(){
  Route::resource('filtro','\App\Http\Controllers\FiltroController');
  Route::post('filtro/{id}/update','\App\Http\Controllers\FiltroController@update');
  Route::get('filtro/{id}/delete','\App\Http\Controllers\FiltroController@destroy');
  Route::get('filtro/{id}/deleteMsg','\App\Http\Controllers\FiltroController@DeleteMsg');
  Route::get('filtro/{id}/borrar','\App\Http\Controllers\FiltroController@borrar');
});

//filtro_usuario Routes
Route::group(['middleware'=> 'web'],function(){
  Route::resource('filtro_usuario','\App\Http\Controllers\Filtro_usuarioController');
  Route::post('filtro_usuario/{id}/update','\App\Http\Controllers\Filtro_usuarioController@update');
  Route::get('filtro_usuario/{id}/delete','\App\Http\Controllers\Filtro_usuarioController@destroy');
  Route::get('filtro_usuario/{id}/deleteMsg','\App\Http\Controllers\Filtro_usuarioController@DeleteMsg');
});

//credito Routes
Route::group(['middleware'=> 'web'],function(){
  Route::resource('credito','\App\Http\Controllers\CreditoController');
  Route::post('credito/{id}/update','\App\Http\Controllers\CreditoController@update');
  Route::get('credito/{id}/delete','\App\Http\Controllers\CreditoController@destroy');
  Route::get('credito/{id}/deleteMsg','\App\Http\Controllers\CreditoController@DeleteMsg');
});

// configuracion del sitio
Route::group(['middleware'=> 'web'],function(){
  
  Route::get('config','AdminController@config');
  Route::post('config','AdminController@updateconfig');
});

//PAgos

Route::group(['middleware'=> 'web'],function(){
  
  Route::get('pagos','AdminController@pago');
  Route::get('pagar/{id}/{estatus}','AdminController@pagar');
});


// Cobro show privado

Route::group(['middleware'=> 'web'],function(){
  
  Route::get('privado/ingresar/{id}','CamController@pago');
});