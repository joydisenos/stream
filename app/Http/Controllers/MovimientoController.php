<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Movimiento;
use App\Info;
use Amranidev\Ajaxis\Ajaxis;
use Illuminate\Support\Facades\Auth;
use URL;

/**
 * Class MovimientoController.
 *
 * @author  The scaffold-interface created at 2018-04-17 08:58:37pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class MovimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {
        $title = 'Index - movimiento';
        $movimientos = Movimiento::where('estado','>','1')->orderBy('created_at','DESC')->paginate(6);
        $pendientes = Movimiento::where('estado','=','1')->orderBy('created_at','DESC')->get();

        return view('movimiento.index',compact('movimientos','title', 'pendientes'));
    }

    public function listausuario()
    {
        $user_id = Auth::user()->id;

        $movimientos = Movimiento::where('user_id', '=' , $user_id)->orderBy('created_at','DESC')->get();

        return view('usuario.movimientos' , compact('movimientos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create - movimiento';
        
        return view('movimiento.create');
    }

    public function comprar()
    {
       $datos = Info::first();
        return view('usuario.comprar',compact('datos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $movimiento = new Movimiento();

        
        $movimiento->user_id = Auth::user()->id;

        
        $movimiento->cantidad = $request->cantidad;

        
        $movimiento->estado = 1;

        
        $movimiento->transaccion = $request->transaccion;

        
        $movimiento->numero_trans = $request->numero_trans;

        
        
        $movimiento->save();

        $pusher = App::make('pusher');

        //default pusher notification.
        //by default channel=test-channel,event=test-event
        //Here is a pusher notification example when you create a new resource in storage.
        //you can modify anything you want or use it wherever.
        $pusher->trigger('test-channel',
                         'test-event',
                        ['message' => 'A new movimiento has been created !!']);

        return redirect('movimientos');
    }

    
    /**
     * Display the specified resource.
     *
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function show($id,Request $request)
    {
        $title = 'Show - movimiento';

        if($request->ajax())
        {
            return URL::to('movimiento/'.$id);
        }

        $movimiento = Movimiento::findOrfail($id);
        return view('movimiento.show',compact('title','movimiento'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $title = 'Edit - movimiento';
        if($request->ajax())
        {
            return URL::to('movimiento/'. $id . '/edit');
        }

        
        $movimiento = Movimiento::findOrfail($id);
        return view('movimiento.edit',compact('title','movimiento'  ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function update($id, Request $Request)
    {
        $movimiento = Movimiento::findOrfail($id);
    	
        $movimiento->user_id = $request->user_id;
        
        $movimiento->cantidad = $request->cantidad;
        
        $movimiento->estado = $request->estado;
        
        $movimiento->transaccion = $request->transaccion;
        
        $movimiento->numero_trans = $request->numero_trans;
        
        
        $movimiento->save();

        return redirect('movimiento');
    }

    /**
     * Delete confirmation message by Ajaxis.
     *
     * @link      https://github.com/amranidev/ajaxis
     * @param    \Illuminate\Http\Request  $request
     * @return  String
     */
    public function DeleteMsg($id,Request $request)
    {
        $msg = Ajaxis::BtDeleting('Warning!!','Would you like to remove This?','/movimiento/'. $id . '/delete');

        if($request->ajax())
        {
            return $msg;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param    int $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     	$movimiento = Movimiento::findOrfail($id);
     	$movimiento->delete();
        return URL::to('movimiento');
    }
}
