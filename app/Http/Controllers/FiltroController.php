<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Filtro;
use Amranidev\Ajaxis\Ajaxis;
use URL;

/**
 * Class FiltroController.
 *
 * @author  The scaffold-interface created at 2018-06-15 08:29:53pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class FiltroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Index - filtro';
        $filtros = Filtro::where('estatus','=',1)->paginate(6);
        return view('filtro.index',compact('filtros','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create - filtro';
        
        return view('filtro.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $filtro = new Filtro();

        
        $filtro->nombre = $request->nombre;

        
        $filtro->estatus = $request->estatus;

        
        
        $filtro->save();

        $pusher = App::make('pusher');

        //default pusher notification.
        //by default channel=test-channel,event=test-event
        //Here is a pusher notification example when you create a new resource in storage.
        //you can modify anything you want or use it wherever.
        $pusher->trigger('test-channel',
                         'test-event',
                        ['message' => 'A new filtro has been created !!']);

        return redirect('filtro');
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
        $title = 'Show - filtro';

        if($request->ajax())
        {
            return URL::to('filtro/'.$id);
        }

        $filtro = Filtro::findOrfail($id);
        return view('filtro.show',compact('title','filtro'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $title = 'Edit - filtro';
        if($request->ajax())
        {
            return URL::to('filtro/'. $id . '/edit');
        }

        
        $filtro = Filtro::findOrfail($id);
        return view('filtro.edit',compact('title','filtro'  ));
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
        $filtro = Filtro::findOrfail($id);
    	
        $filtro->nombre = $request->nombre;
        
        $filtro->estatus = $request->estatus;
        
        
        $filtro->save();

        return redirect('filtro');
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
        $msg = Ajaxis::BtDeleting('Warning!!','Would you like to remove This?','/filtro/'. $id . '/delete');

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
     	$filtro = Filtro::findOrfail($id);
     	$filtro->delete();
        return URL::to('filtro');
    }

    public function borrar($id)
    {
        $filtro = Filtro::findOrfail($id);
        $filtro->estatus = 0;
        $filtro->save();

        return redirect()->back()->with('status','Categoría eliminada Correctamente');
    }
}
