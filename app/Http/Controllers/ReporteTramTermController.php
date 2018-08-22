<?php

namespace Notaria\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Notaria\TramitesTerminados;
use Notaria\CarpetasTerm;
use Notaria\TramTermClient;
use Notaria\TramTermCarpet;
class ReporteTramTermController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
  
        
        $Tramites =DB::table('tramites_terminados')
        ->Join('clientes', 'tramites_terminados.cliente_id', '=', 'clientes.id')
        ->Join('tipos_tramites', 'tramites_terminados.tramite_id', '=', 'tipos_tramites.id')
        ->select('tramites_terminados.*','clientes.nombre','tipos_tramites.tramite')
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
 
         return view('/reporte_tramterm', compact('conceptos','funciones','Tramites')); 
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
        $cliente = TramitesTerminados::tramites($id);
        return response()->json($cliente); 
      }
    }
    ///////////// 
    public function store1(Request $request)
    { 
        if($request->ajax()){
        $cliente = CarpetasTerm::carpeta(); 
        return response()->json($cliente); 
      }
    } 
    //////////////////// 

    public function store2(Request $request,$id)
    { 
        if($request->ajax()){ 
        $cliente = TramTermClient::client($id);
        return response()->json($cliente); 
      } 
    }

    public function store3(Request $request,$id)
    { 
        if($request->ajax()){
        $cliente = TramTermCarpet::carpet($id);
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
