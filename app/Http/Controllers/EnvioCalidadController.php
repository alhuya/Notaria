<?php

namespace Notaria\Http\Controllers; 
use Illuminate\Support\Facades\Auth;

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
        $carpetas = DB::table('control_tramites')
        ->leftJoin('clientes', 'control_tramites.cliente_id', '=', 'clientes.id')
        ->select('control_tramites.*')
        ->get();

        $puesto = Auth::user()->puesto_id;
               
       
        $conceptos = DB::table('menu_concepto')
         ->where('menu_concepto.puesto_id', '=', $puesto)
         ->select('menu_concepto.*')
         ->get();
 
         $funciones = DB::table('menu')
         ->where('menu.puesto_id', '=', $puesto)
         ->select('menu.*')
         ->get();


        return view('/envio_control_calidad',compact('carpetas','conceptos','funciones')); 
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
        
        $carpeta = $request->input('carpeta');
        $revision = $request->input('revision');
        $comentario = $request->input('comentario');

        $consulta = DB::table('revisiones')
        ->where('revisiones.carpeta_id','=', $carpeta)
        ->select('revisiones.*') 
        
        ->get();

        if ($consulta->isEmpty()) {

      $cliente = new Reviciones;
     
      $cliente->fecha = Now();
      $cliente->tipo_revision = $request->input('revision'); 
      $cliente->comentario= $request->input('comentario'); 
      $cliente->carpeta_id= $request->input('carpeta');   
      $cli =  $cliente->cliente_id;
      //$rev =   $cliente->tipo_revision;
      $cliente->save();

      $revisiones = DB::table('revisiones')
      -> orderBy('revision_id', 'desc')
      -> take(1)
      ->select('revisiones.*')
      ->get();

      $rev;
      foreach($revisiones as $revision){

        $rev = $revision ->revision_id;
      }

      DB::table('control_tramites')
            ->where('carpeta_id','=', $carpeta)
            ->update(['revision' => $rev]); 

            return redirect('/envio_control_calidad')->with('status','Revicion guardado exitosamente');

        }
        else{

            DB::table('revisiones')
            ->where('carpeta_id','=', $carpeta)
            ->update(['fecha'=> Now(),'tipo_revision' => $revision,'comentario' => $comentario]);

            return redirect('/envio_control_calidad')->with('status','Revicion actualizada exitosamente');


        }

/*
      
 
*/
      

     
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
