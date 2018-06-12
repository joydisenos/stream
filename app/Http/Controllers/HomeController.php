<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Dato;
use App\Billetera;
use App\User;

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
        $billeteras = Billetera::where('user_id', $user_id)->first();
        $camaras= User::take(9)->get();

        if(!$datos)
        {

        $dato = new Dato;

        $dato->user_id = Auth::user()->id;

        $dato->biografia = 'vacio';

        $dato->foto_perfil = 'def-escort.jpg';

        $dato->nacimiento_ano = 'vacio';

        $dato->sexo = 'vacio';

        $dato->localidad = 'vacio';

        $dato->interes = 'vacio';

        $dato->detalles_cita = 'vacio';

        $dato->save();

        
        }

        if(!$billeteras)
        {
            $billetera = new Billetera;

            $billetera->user_id = Auth::user()->id;

            $billetera->disponible = 0;

            $billetera->estado = 1;

            $billetera->save();

            

        }


        return view('usuario', compact('camaras'));
    }
}
