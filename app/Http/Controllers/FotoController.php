<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Foto;
use Amranidev\Ajaxis\Ajaxis;
use URL;

/**
 * Class FotoController.
 *
 * @author  The scaffold-interface created at 2018-04-19 08:27:13pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class FotoController extends Controller
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
        $title = 'Index - foto';
        $fotos = Foto::paginate(6);
        return view('foto.index',compact('fotos','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create - foto';
        
        return view('foto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $foto = new Foto();

        
        $foto->url = $request->url;

        
        $foto->tags = $request->tags;

        
        $foto->user_id = $request->user_id;

        
        $foto->titulo = $request->titulo;

        
        
        $foto->save();

        $pusher = App::make('pusher');

        //default pusher notification.
        //by default channel=test-channel,event=test-event
        //Here is a pusher notification example when you create a new resource in storage.
        //you can modify anything you want or use it wherever.
        $pusher->trigger('test-channel',
                         'test-event',
                        ['message' => 'A new foto has been created !!']);

        return redirect('foto');
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
        $title = 'Show - foto';

        if($request->ajax())
        {
            return URL::to('foto/'.$id);
        }

        $foto = Foto::findOrfail($id);
        return view('foto.show',compact('title','foto'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $title = 'Edit - foto';
        if($request->ajax())
        {
            return URL::to('foto/'. $id . '/edit');
        }

        
        $foto = Foto::findOrfail($id);
        return view('foto.edit',compact('title','foto'  ));
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
        $foto = Foto::findOrfail($id);
    	
        $foto->url = $request->url;
        
        $foto->tags = $request->tags;
        
        $foto->user_id = $request->user_id;
        
        $foto->titulo = $request->titulo;
        
        
        $foto->save();

        return redirect('foto');
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
        $msg = Ajaxis::BtDeleting('Warning!!','Would you like to remove This?','/foto/'. $id . '/delete');

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
     	$foto = Foto::findOrfail($id);
     	$foto->delete();
        return URL::to('foto');
    }
}
