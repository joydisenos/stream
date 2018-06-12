<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dato;
use App\Cita;

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

        return redirect()->back()->with('status','Usuario Afiliado con éxito');
    }

    public function citas()
    {
        $citas = Cita::all();
        return view('citas.citas',compact('citas'));
    }
}
