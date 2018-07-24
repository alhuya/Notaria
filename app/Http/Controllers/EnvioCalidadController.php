<?php

namespace Notaria\Http\Controllers; 

use Illuminate\Http\Request;
use DB;
use Notaria\Reviciones;
use Notaria\ControlTramites;

class EnvioCalidadController extends Controller
{
    /**
     * Display a listing of the resource. 
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = DB::table('control_tramites')
        ->leftJoin('clientes', 'control_tramites.cliente_id', '=', 'clientes.id')
        ->select('control_tramites.*', 'clientes.nombre','clientes.apellido_paterno','clientes.apellido_materno')
        ->get();


        return view('/envio_control_calidad',compact('clientes')); 
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
        

      $cliente = new Reviciones;
      $cliente->cliente_id = $request->input('cliente');
      $cliente->fecha = Now();
      $cliente->tipo_revision = $request->input('revision');  
      $cliente->tipo_tramite_id = $request->input('tramite'); 
      $cliente->comentario= $request->input('comentario'); 
      $cliente->control_tramite_id= $request->input('carpeta');   
      $cli =  $cliente->cliente_id;
      $rev =   $cliente->tipo_revision;
      $cliente->save();



      DB::table('control_tramites')
            ->where('cliente_id','=', $cli)
            ->update(['revision' => $rev]);
 

      

      return redirect('/envio_control_calidad')->with('status','Revicion guardado exitosamente');
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
}
