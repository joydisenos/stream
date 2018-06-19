<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Credito;
use Amranidev\Ajaxis\Ajaxis;
use URL;

/**
 * Class CreditoController.
 *
 * @author  The scaffold-interface created at 2018-06-19 01:25:07pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class CreditoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Index - credito';
        $creditos = Credito::paginate(6);
        return view('credito.index',compact('creditos','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create - credito';
        
        return view('credito.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $credito = new Credito();

        
        $credito->nombre = $request->nombre;

        
        $credito->cantidad = $request->cantidad;

        
        $credito->valor = $request->valor;

        
        $credito->descripcion = $request->descripcion;

        
        
        $credito->save();

        $pusher = App::make('pusher');

        //default pusher notification.
        //by default channel=test-channel,event=test-event
        //Here is a pusher notification example when you create a new resource in storage.
        //you can modify anything you want or use it wherever.
        $pusher->trigger('test-channel',
                         'test-event',
                        ['message' => 'A new credito has been created !!']);

        return redirect('credito');
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
        $title = 'Show - credito';

        if($request->ajax())
        {
            return URL::to('credito/'.$id);
        }

        $credito = Credito::findOrfail($id);
        return view('credito.show',compact('title','credito'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $title = 'Edit - credito';
        if($request->ajax())
        {
            return URL::to('credito/'. $id . '/edit');
        }

        
        $credito = Credito::findOrfail($id);
        return view('credito.edit',compact('title','credito'  ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
        $credito = Credito::findOrfail($id);
    	
        $credito->nombre = $request->nombre;
        
        $credito->cantidad = $request->cantidad;
        
        $credito->valor = $request->valor;
        
        $credito->descripcion = $request->descripcion;
        
        
        $credito->save();

        return redirect('credito');
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
        $msg = Ajaxis::BtDeleting('Warning!!','Would you like to remove This?','/credito/'. $id . '/delete');

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
     	$credito = Credito::findOrfail($id);
     	$credito->delete();
        return URL::to('credito');
    }
}
