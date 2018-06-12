<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\User;
use App\Dato;
use ElfSundae\Laravel\Hashid\Facades\Hashid;


class CamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // configurar con socket para listar en tiempo real

        $camaras= Dato::where('afiliado' ,'=', 2)->paginate(12);
        $ultimas = Dato::orderBy('created_at','DESC')->where('afiliado' ,'=', 2)->take(5)->get();
        $hombres = Dato::orderBy('created_at','DESC')->where('afiliado' ,'=', 2)->where('sexo','=','hombre')->take(5)->get();
        $mujeres = Dato::orderBy('created_at','DESC')->where('afiliado' ,'=', 2)->where('sexo','=','mujer')->take(5)->get();

        return view('inicio', compact('camaras','ultimas','hombres','mujeres'));
    }
    public function filtrar ($filtro)
    {
        $camaras = Dato::orderBy('created_at','DESC')->where('afiliado' ,'=', 2)->where('sexo','=', $filtro )->paginate(12);
        $ultimas = Dato::orderBy('created_at','DESC')->where('afiliado' ,'=', 2)->take(5)->get();
        $hombres = Dato::orderBy('created_at','DESC')->where('afiliado' ,'=', 2)->where('sexo','=','hombre')->take(5)->get();
        $mujeres = Dato::orderBy('created_at','DESC')->where('afiliado' ,'=', 2)->where('sexo','=','mujer')->take(5)->get();



        return view('filtro', compact('camaras','ultimas','hombres','mujeres'));

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
        // mostrar Camaras con filtrado de conectado

        $id_deco = Hashid::decode($id);

        $user = User::findOrFail($id_deco[0]);

        return view('camara', compact('user','id'));
    }

    public function detalles($id)
    {
        $id_deco = Hashid::decode($id);

        $user = User::findOrFail($id_deco[0]);


        return view('detalles', compact('user','id'));

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
}
