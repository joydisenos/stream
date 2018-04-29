<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Dato;
use Amranidev\Ajaxis\Ajaxis;
use Illuminate\Support\Facades\Auth;
use URL;

/**
 * Class DatoController.
 *
 * @author  The scaffold-interface created at 2018-04-17 08:54:36pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class DatoController extends Controller
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
        $title = 'Index - dato';
        $datos = Dato::paginate(6);
        return view('dato.index',compact('datos','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create - dato';
        
        return view('dato.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dato = new Dato();

        
        $dato->user_id = $request->user_id;

        
        $dato->biografia = $request->biografia;

        
        $dato->nacimiento_ano = $request->nacimiento_ano;

        
        $dato->sexo = $request->sexo;

        
        $dato->localidad = $request->localidad;

        
        $dato->interes = $request->interes;

        
        
        $dato->save();

        $pusher = App::make('pusher');

        //default pusher notification.
        //by default channel=test-channel,event=test-event
        //Here is a pusher notification example when you create a new resource in storage.
        //you can modify anything you want or use it wherever.
        $pusher->trigger('test-channel',
                         'test-event',
                        ['message' => 'A new dato has been created !!']);

        return redirect('dato');
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
        $title = 'Show - dato';

        if($request->ajax())
        {
            return URL::to('dato/'.$id);
        }

        $dato = Dato::findOrfail($id);
        return view('dato.show',compact('title','dato'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $title = 'Edit - dato';
        if($request->ajax())
        {
            return URL::to('dato/'. $id . '/edit');
        }

        
        $dato = Dato::findOrfail($id);
        return view('dato.edit',compact('title','dato'  ));
    }


    public function editar($id,Request $request)
    {
        $title = 'Edit - dato';
          
        $dato = Dato::findOrfail($id);
        return view('usuario.actualizardatos',compact('title','dato'  ));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function actualizar($id,Request $request)
    {
        $dato = Dato::findOrfail($id);
    	
        $dato->user_id = $request->user_id;
        
        $dato->biografia = $request->biografia;
        
        $dato->nacimiento_ano = $request->nacimiento_ano;
        
        $dato->sexo = $request->sexo;
        
        $dato->localidad = $request->localidad;
        
        $dato->interes = $request->interes;
        
        
        $dato->save();

        return redirect('usuario');
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
        $msg = Ajaxis::BtDeleting('Warning!!','Would you like to remove This?','/dato/'. $id . '/delete');

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
     	$dato = Dato::findOrfail($id);
     	$dato->delete();
        return URL::to('dato');
    }

    public function mostrar()
    {
        $usuario = Auth::user();

        return view('perfil.show', compact('usuario'));
    }

    public function update($id,Request $request)
    {
        $dato = Dato::findOrfail($id);
        
        $dato->user_id = $request->user_id;
        
        $dato->biografia = $request->biografia;
        
        $dato->nacimiento_ano = $request->nacimiento_ano;
        
        $dato->sexo = $request->sexo;
        
        $dato->localidad = $request->localidad;
        
        $dato->interes = $request->interes;
        
        
        $dato->save();

        return redirect('perfil');
    }
}
