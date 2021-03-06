<?php

namespace Notaria\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Notaria\RepTramites;

class ReporteDOCTRAMController extends Controller
{
    /**
     * Display a listing of the resource. 
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Tramites =DB::table('tipos_tramites')
        ->select('tipos_tramites.*')
        ->get();  
        $hoy = date('Y-m-d');

        $Clientes =DB::table('vitacora')
        ->where('vitacora.fecha', '=', $hoy)
        ->select('vitacora.*')
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
 
         return view('/reporte_doctram', compact('conceptos','funciones','Tramites','Clientes'));  
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
        $cliente = RepTramites::reportes($id); 
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
