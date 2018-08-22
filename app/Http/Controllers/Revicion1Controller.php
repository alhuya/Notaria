<?php

namespace Notaria\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Notaria\ControlTramites;
use Notaria\Reviciones;
class Revicion1Controller extends Controller 
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index()
    {

        $revisiones = DB::table('revisiones')
        -> where('revisiones.tipo_revision', '=', 1)
        ->select('revisiones.*')
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


        return view('/revicion1',compact('revisiones','conceptos','funciones')); 
      
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
    public function store(Request $request,$id)
    {
        if($request->ajax()){ 
        $cliente = ControlTramites::tramite($id);
        return response()->json($cliente); 
      }
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
    public function update(Request $request){
    
        $carpeta = $request->input('carpeta');
        $comentario = $request->input('comentariocal');
        $estatus = $request->input('estatus');

        DB::table('revisiones')
        ->where('carpeta_id','=', $carpeta)
        ->update(['comentario_cal' => $comentario,'estatus1' => $estatus]);//editar las reviciones cuando la condicion se cumpla

        


        return redirect('/revicion1')->with('status','Revision 1 guardada exitosamente');

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
