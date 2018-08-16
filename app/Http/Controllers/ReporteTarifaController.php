<?php

namespace Notaria\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class ReporteTarifaController extends Controller
{/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index(Request $request ,$id) {
          
        $puesto = Auth::user()->puesto_id;


        $valores = DB::table('tipos_tramites')
         ->where('tipos_tramites.id', '=', $id)
         ->select('tipos_tramites.*')
         ->get();
        
 
        $conceptos = DB::table('menu_concepto')
         ->where('menu_concepto.puesto_id', '=', $puesto)
         ->select('menu_concepto.*')
         ->get();
 
         $funciones = DB::table('menu')
         ->where('menu.puesto_id', '=', $puesto)  
         ->select('menu.*')
         ->get();

         $Tarifas = DB::table('conceptos_costos')
         ->leftJoin('tipos_tramites', 'conceptos_costos.tramite_id', '=', 'tipos_tramites.id')
         ->leftJoin('tipo_tarifa', 'conceptos_costos.costo_tramite_id', '=', 'tipo_tarifa.id')
         ->where('conceptos_costos.tramite_id', '=', $id)
         ->select('conceptos_costos.*','tipos_tramites.tramite','tipos_tramites.id','tipo_tarifa.tipo')
         ->get(); 
 
         return view('/Reporte_Tarifa', compact('conceptos','funciones','Tarifas','valores'));  
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
