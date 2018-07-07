<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Dato;
use App\Info;
use App\User;
use App\Cita;
use App\Billetera;
use App\Pago;
use App\Filtro;
use App\Filtro_usuario;
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

        $validatedData = $request->validate([
        'foto_perfil' => 'image',
    ]);


        if ($request->hasFile('foto_perfil')) 
        {
        $file = $request->file('foto_perfil');
        $nombre = $file->getClientOriginalName();
        \Storage::disk('public')->put($nombre,  \File::get($file));
        }

        $dato = Dato::findOrfail($id);
        if ($request->hasFile('foto_perfil')) 

        {
        $dato->foto_perfil = $nombre;
        }
    	
        $dato->user_id = $request->user_id;
        
        $dato->biografia = $request->biografia;
        
        $dato->nacimiento_ano = $request->nacimiento_ano;
        
        $dato->sexo = $request->sexo;
        
        $dato->localidad = $request->localidad;
        
        $dato->interes = $request->interes;

        if($dato->afiliado == 2)
        {
                       
            $dato->edad = $request->edad;
            
            $dato->provincia = $request->provincia;
            
            $dato->telefono = $request->telefono;

            $dato->precio_cam_sesion = $request->precio_cam_sesion;

            $dato->precio_cam_hora = $request->precio_cam_hora;
        
            if($request->citas)
             {
                $dato->citas = $request->citas;
             }else{
                $dato->citas = 0;
             }
        
            if($request->precio_cita_hora != null)
             {
                $dato->precio_cita_hora = $request->precio_cita_hora;
            }
        
            if($request->precio_cita_dia != null)
            {
                $dato->precio_cita_dia = $request->precio_cita_dia;
             }

            if($request->detalles_cita != null)
            {
                $dato->detalles_cita = $request->detalles_cita;
            }

            /*if($request->natural != null)
            {
                $dato->natural = $request->natural;
            }else{
                $dato->natural = 0;
            }

            if($request->fitness != null)
            {
                $dato->fitness = $request->fitness;
            }else{
                $dato->fitness = 0;
            }

            if($request->grandespechos != null)
            {
                $dato->grandespechos = $request->grandespechos;
            }else{
                $dato->grandespechos = 0;
            }

            if($request->trasero != null)
            {
                $dato->trasero = $request->trasero;
            }else{
                $dato->trasero = 0;
            }*/

        }
        
        
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

    public function afiliar()
    {
        $categorias = Filtro::where('estatus','=',1)->get();

        return view('afiliar',compact('categorias'));
    }

    public function afiliar_solicitud(Request $request)
    {

        
      
        $id = Auth::user()->id;

        $dato = Dato::findOrFail($id);

        $dato->afiliado = 1;
            
        $dato->edad = $request->edad;

        $dato->biografia = $request->biografia;

        $dato->nacimiento_ano = $request->nacimiento_ano;

        $dato->sexo = $request->sexo;

        $dato->localidad = $request->localidad;

        $dato->interes = $request->interes;
            
        $dato->provincia = $request->provincia;
            
        $dato->telefono = $request->telefono;

        $dato->precio_cam_sesion = $request->precio_cam_sesion;

        $dato->precio_cam_hora = $request->precio_cam_hora;
        
        if($request->citas)
        {
                $dato->citas = $request->citas;
        }
        
        if($request->precio_cita_hora != null)
        {
                $dato->precio_cita_hora = $request->precio_cita_hora;
        }
        
        if($request->precio_cita_dia != null)
        {
                $dato->precio_cita_dia = $request->precio_cita_dia;
        }

        if($request->detalles_cita != null)
        {
                $dato->detalles_cita = $request->detalles_cita;
        }

        /*

        if($request->natural != null)
            {
                $dato->natural = $request->natural;
            }

            if($request->fitness != null)
            {
                $dato->fitness = $request->fitness;
            }

            if($request->grandespechos != null)
            {
                $dato->grandespechos = $request->grandespechos;
            }

            if($request->trasero != null)
            {
                $dato->trasero = $request->trasero;
            }
        */
            $categorias = $request->input('categoria');

            foreach ($categorias as $filtro => $n) 
            {
                $filtro = new Filtro_usuario();
                $filtro->user_id = Auth::user()->id;
                $filtro->filtro_id = $n;
                $filtro->save();
            }
        $dato->save();

        return redirect('usuario')->with('status','Su Solicitud será procesada en breve nos comunicaremos para confirmar su afiliación');


        
    }

    public function citas(Request $request)
    {
        $info = Info::all()->first();
        $afiliado = User::findOrFail($request->user_id);
        

        $config = Info::first();

        $preciodia = $afiliado->dato->precio_cita_dia;
        $preciohora = $afiliado->dato->precio_cita_hora;

        $preciodiat = ($preciodia + (($preciodia * $config->comision) / 100)) / $config->valor_usd; 
        $preciohorat = ($preciohora + (($preciohora * $config->comision) / 100)) / $config->valor_usd; 

        if(Auth::user()->billetera->disponible >= $preciodiat)
        {
                $cita = new Cita();
                $cita->user_id = $request->user_id;
                $cita->email = $request->email;
                $cita->detalles = implode(",", $request->input('detalles'));
                $cita->estatus = 1;
                $cita->save();

                $billetera = Auth::user()->billetera;
                $billetera->disponible = $billetera->disponible - $preciodiat;
                $billetera->save();


                $pago = new Pago();
                $pago->user_id_usuario = Auth::user()->id;
                $pago->user_id_afiliado = $request->user_id;
                $pago->creditos = $preciodia;
                $pago->save();
        
                return redirect()->back()->with('status','Solicitud Realizada correctamente, nos contactaremos con usted para procesar su requerimiento');
        }else{
                return redirect()->back()->with('status','No tiene Suficientes créditos para realizar esta solicitud');
        }
    }
}
