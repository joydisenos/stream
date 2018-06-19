<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Filtro_usuario;
use Amranidev\Ajaxis\Ajaxis;
use URL;

/**
 * Class Filtro_usuarioController.
 *
 * @author  The scaffold-interface created at 2018-06-15 08:31:02pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Filtro_usuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Index - filtro_usuario';
        $filtro_usuarios = Filtro_usuario::paginate(6);
        return view('filtro_usuario.index',compact('filtro_usuarios','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create - filtro_usuario';
        
        return view('filtro_usuario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $filtro_usuario = new Filtro_usuario();

        
        $filtro_usuario->user_id = $request->user_id;

        
        $filtro_usuario->filtro_id = $request->filtro_id;

        
        
        $filtro_usuario->save();

        $pusher = App::make('pusher');

        //default pusher notification.
        //by default channel=test-channel,event=test-event
        //Here is a pusher notification example when you create a new resource in storage.
        //you can modify anything you want or use it wherever.
        $pusher->trigger('test-channel',
                         'test-event',
                        ['message' => 'A new filtro_usuario has been created !!']);

        return redirect('filtro_usuario');
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
        $title = 'Show - filtro_usuario';

        if($request->ajax())
        {
            return URL::to('filtro_usuario/'.$id);
        }

        $filtro_usuario = Filtro_usuario::findOrfail($id);
        return view('filtro_usuario.show',compact('title','filtro_usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $title = 'Edit - filtro_usuario';
        if($request->ajax())
        {
            return URL::to('filtro_usuario/'. $id . '/edit');
        }

        
        $filtro_usuario = Filtro_usuario::findOrfail($id);
        return view('filtro_usuario.edit',compact('title','filtro_usuario'  ));
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
        $filtro_usuario = Filtro_usuario::findOrfail($id);
    	
        $filtro_usuario->user_id = $request->user_id;
        
        $filtro_usuario->filtro_id = $request->filtro_id;
        
        
        $filtro_usuario->save();

        return redirect('filtro_usuario');
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
        $msg = Ajaxis::BtDeleting('Warning!!','Would you like to remove This?','/filtro_usuario/'. $id . '/delete');

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
     	$filtro_usuario = Filtro_usuario::findOrfail($id);
     	$filtro_usuario->delete();
        return URL::to('filtro_usuario');
    }
}
