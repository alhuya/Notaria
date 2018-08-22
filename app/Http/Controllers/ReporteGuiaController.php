<?php

namespace Notaria\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Notaria\Guia;
use Notaria\GuiaCliente;
use Notaria\Carpetas;
use Notaria\GuiaCarpeta;

class ReporteGuiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $Escrituras =DB::table('control_tramites')
        ->select('control_tramites.*')
        ->get(); 

        $Clientes =DB::table('clientes')
        ->select('clientes.*')
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
 
         return view('/reporte_guia', compact('conceptos','funciones','Escrituras','Clientes'));  
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
        $cliente = Guia::guia($id);
        return response()->json($cliente); 
      }
    }
    /////////////
    public function store1(Request $request)
    { 
        if($request->ajax()){
        $cliente = Carpetas::carpeta(); 
        return response()->json($cliente); 
      }
    }
    ////////////////////

    public function store2(Request $request,$id)
    { 
        if($request->ajax()){
        $cliente = GuiaCliente::cliente($id);
        return response()->json($cliente); 
      }
    }

    public function store3(Request $request,$id)
    { 
        if($request->ajax()){
        $cliente = GuiaCarpeta::carpeta($id);
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
