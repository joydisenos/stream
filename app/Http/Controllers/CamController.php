<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\User;
use App\Filtro;
use App\Filtro_usuario;
use App\Dato;
use App\Billetera;
use App\Pago;
use App\Foto;
use ElfSundae\Laravel\Hashid\Facades\Hashid;
use Cookie;
use App\Info;
use Illuminate\Support\Facades\Auth;


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

        
        
        Cookie::queue('advertencia', true, 5000);

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

    public function categorias ($filtro)
    {
        $camaras = Filtro_usuario::orderBy('created_at','DESC')->where('filtro_id' ,'=', $filtro)->where('estatus','=', 1)->paginate(12);

        $ultimas = Dato::orderBy('created_at','DESC')->where('afiliado' ,'=', 2)->take(5)->get();
        $hombres = Dato::orderBy('created_at','DESC')->where('afiliado' ,'=', 2)->where('sexo','=','hombre')->take(5)->get();
        $mujeres = Dato::orderBy('created_at','DESC')->where('afiliado' ,'=', 2)->where('sexo','=','mujer')->take(5)->get();



        return view('categorias', compact('camaras','ultimas','hombres','mujeres'));

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

        $datos = Info::first();

        return view('camara', compact('user','id','datos'));
    }

    public function detalles($id)
    {
        $id_deco = Hashid::decode($id);

        $user = User::findOrFail($id_deco[0]);

        $ultimafoto = Foto::where('user_id','=', $id_deco[0])->orderBy('created_at','DESC')->first();


        return view('detalles', compact('user','id','ultimafoto'));

    }

    public function pago($id)
    {
        $id_deco = Hashid::decode($id);

        $user = User::findOrFail($id_deco[0]);


        // creditos necesarios del afiliado
        $creditos = $user->dato->precio_cam_sesion;
        
        //usuario descuento y verificación
        $auth = Auth::user()->id;
        $usuario = User::findOrFail($auth);
        
        if($usuario->billetera->disponible >= $creditos)
        {
                $billetera = Billetera::where('user_id','=', $auth)->first();
                $billetera->disponible = $billetera->disponible - $creditos;
                $billetera->save();


                $pago = new Pago();
                $pago->user_id_usuario = (int)$auth;
                $pago->user_id_afiliado = (int)$id_deco;
                $pago->creditos = (float)$creditos;
                $pago->estatus = '1';
                $pago->save();

                return redirect()->back()->with('status','Pago realizado con éxito');
        }else{
            return redirect()->back()->with('status','No tiene suficientes créditos para realizar esta operación');
        }

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
