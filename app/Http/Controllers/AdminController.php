<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dato;
use App\Info;
use App\Cita;
use App\Filtro_usuario;
use ElfSundae\Laravel\Hashid\Facades\Hashid;
use App\Pago;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function config()
    {

        $datos = Info::first();
        if(!$datos)
        {
            $datos = new Info();
            $datos->link1 = 'vacio';
            $datos->link1_url = 'vacio';
            $datos->link2 = 'vacio';
            $datos->link2_url = 'vacio';
            $datos->link3 = 'vacio';
            $datos->link3_url = 'vacio';
            $datos->link4 = 'vacio';
            $datos->link4_url = 'vacio';
            $datos->politicas = 'vacio';
            $datos->valor_usd = 0;
            $datos->valor_btc = 0;
            $datos->save();
        }
        return view('config.config',compact('datos'));
    }

    public function updateconfig(Request $request)
    {
        $datos = Info::first();
        $datos->politicas = $request->politicas;
        $datos->valor_usd = $request->valor_usd;
        $datos->save();

        return redirect()->back()->with('status','Actualizado con éxito');
    }

    public function afiliados()
    {
        
        $solicitudes = Dato::where('afiliado','=',1)->get();
        $afiliados = Dato::where('afiliado','=',2)->get();

        return view('afiliados.afiliados',compact('afiliados','solicitudes'));
    }

    public function afiliar($id)
    {
        $dato = Dato::findOrFail($id);
        $dato->afiliado = 2;
        $dato->save();

        
        $filtros = Filtro_usuario::where('user_id','=',$dato->user_id)->get();
        foreach ($filtros as $filtro) 
        {
            $filtro->estatus = 1;
            $filtro->save();
        }
        

        return redirect()->back()->with('status','Usuario Afiliado con éxito');
    }

    public function citas()
    {
        $citas = Cita::all();
        return view('citas.citas',compact('citas'));
    }

    public function pago()
    {
        $pendientes = Pago::where('estatus','=', 1)->get();
        $pagos = Pago::where('estatus','!=', 1)->get();
        return view('pagos.pagos',compact('pendientes','pagos'));
    }

    public function pagar($id , $estatus)
    {
        $id_deco = Hashid::decode($id);
        $pago = Pago::findOrFail($id_deco[0]);
        $pago->estatus = $estatus;
        $pago->save();

        return redirect()->back()->with('status','Operación realizada con éxito');
    }
}
