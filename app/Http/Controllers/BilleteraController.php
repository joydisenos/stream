<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Billetera;
use App\Movimiento;
use App\User;
use Amranidev\Ajaxis\Ajaxis;
use ElfSundae\Laravel\Hashid\Facades\Hashid;
use URL;

/**
 * Class BilleteraController.
 *
 * @author  The scaffold-interface created at 2018-04-19 08:24:46pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class BilleteraController extends Controller
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
        $title = 'Index - billetera';
        $billeteras = Billetera::paginate(6);
        return view('billetera.index',compact('billeteras','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create - billetera';
        
        return view('billetera.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $billetera = new Billetera();

        
        $billetera->user_id = $request->user_id;

        
        $billetera->disponible = $request->disponible;

        
        $billetera->estado = $request->estado;

        
        
        $billetera->save();

        $pusher = App::make('pusher');

        //default pusher notification.
        //by default channel=test-channel,event=test-event
        //Here is a pusher notification example when you create a new resource in storage.
        //you can modify anything you want or use it wherever.
        $pusher->trigger('test-channel',
                         'test-event',
                        ['message' => 'A new billetera has been created !!']);

        return redirect('billetera');
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
        $title = 'Show - billetera';
        
        $id_deco = Hashid::decode($id);

        if($request->ajax())
        {
            return URL::to('billetera/'.$id_deco);
        }

        $billetera = Billetera::findOrfail($id_deco);
        return view('billetera.show',compact('title','billetera'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $title = 'Edit - billetera';

        $id_deco = Hashid::decode($id);


        if($request->ajax())
        {
            return URL::to('billetera/'. $id_deco[0] . '/edit');
        }

        
        $billetera = Billetera::findOrfail($id_deco[0]);


        return view('billetera.edit',compact('title','billetera'  ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function aprobar($id)
    {
        $id_deco = Hashid::decode($id);

        $movimiento = Movimiento::findOrfail($id_deco[0]);

        $movimiento->estado = 2;

        $movimiento->save();


        $usuario = User::findOrfail($movimiento->user_id);

        $billetera = Billetera::findOrfail($usuario->billetera->id);
        
        $billetera->disponible = $billetera->disponible + $movimiento->cantidad;
        
        $billetera->save();

        return redirect('movimiento');
    }

    public function negar($id)
    {
        $id_deco = Hashid::decode($id);

        $movimiento = Movimiento::findOrfail($id_deco[0]);

        $movimiento->estado = 3;

        $movimiento->save();

        return redirect('movimiento');

    }

    public function update($id,Request $request)
    {

        $id_deco=Hashid::decode($id);

        $billetera = Billetera::findOrfail($id_deco[0]);

        $billetera->disponible = $request->disponible;
        
        $billetera->estado = $request->estado;
        
        $billetera->save();
        
        return redirect('billetera');
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
        $msg = Ajaxis::BtDeleting('Warning!!','Would you like to remove This?','/billetera/'. $id . '/delete');

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
     	$billetera = Billetera::findOrfail($id);
     	$billetera->delete();
        return URL::to('billetera');
    }
}
