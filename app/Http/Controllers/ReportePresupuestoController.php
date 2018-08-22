<?php

namespace Notaria\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Notaria\Clientes; 
use Notaria\Menu;
use DB;
use Notaria\Concepto; 
use Notaria\ControlTramites; 
use Notaria\CostoTramite;


class ReportePresupuestoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index() 
    {

        $concepts = Concepto::all(); 
        $valores = CostoTramite::all(); 
        $Tramites = ControlTramites::all(); 

        $Escrituras =DB::table('control_tramites')
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
 
         return view('/reporte_presupuesto', compact('conceptos','funciones','Escrituras','concepts','valores','Tramites')); 
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
        $cliente = Menu::categorias($id);
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
