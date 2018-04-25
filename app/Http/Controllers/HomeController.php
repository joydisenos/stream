<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Dato;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $user_id = Auth::user()->id;

        $datos = Dato::where('user_id', $user_id)->first();


        if(!$datos){

        $dato = new Dato;

        $dato->user_id = Auth::user()->id;

        $dato->biografia = 'vacio';

        $dato->nacimiento_ano = 'vacio';

        $dato->sexo = 'vacio';

        $dato->localidad = 'vacio';

        $dato->interes = 'vacio';

        $dato->save();
        }

        $datos = Dato::where('user_id', $user_id)->first();

        return view('usuario', compact('datos'));
    }
}
