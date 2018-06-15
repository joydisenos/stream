<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Foto;
use Amranidev\Ajaxis\Ajaxis;
use Illuminate\Support\Facades\Auth;
use URL;
use ElfSundae\Laravel\Hashid\Facades\Hashid;

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


        // old $file = $request->file('url');
        //$nombre = $file->getClientOriginalName();
        //\Storage::disk('public')->put($nombre,  \File::get($file));
        
        $file = $request->file('file');
        $path = public_path() . '/storage';
        $fileName = uniqid() . $file->getClientOriginalName();

        $file->move($path, $fileName);


        $foto = new Foto();

        
        $foto->url = $fileName;

                
        $foto->tags = Auth::user()->dato->sexo;

        
        $foto->user_id = Auth::user()->id;

        
        $foto->titulo = 'Galería de Foto'.Auth::user()->name;

        
        
        $foto->save();

       

        return redirect()->back()->with('status','Foto Agregada con éxito');
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

    public function vision($id , $estatus)
    {

        $id_deco = Hashid::decode($id);
        $foto = Foto::findOrfail($id_deco[0]);
        $foto->publico = $estatus;
        $foto->save();

        return redirect()->back()->with('status','cambio de visibilidad exitoso');
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
        return redirect()->back()->with('status','Foto Eliminada');
    }
}
