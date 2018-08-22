<?php

namespace Notaria\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Notaria\Clientes; 
use Notaria\Vitacora; 

use DB;
class ReporteVitacoraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        $clientes =DB::table('clientes')
        ->join('municipios', 'clientes.municipio_id', '=', 'municipios.id')
        ->join('estados', 'clientes.estado_id', '=', 'estados.id')
        ->select( 'clientes.*','municipios.municipio','estados.estado')
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

      
 
         return view('/reporte_vitacora', compact('conceptos','funciones','clientes')); 
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
    public function store(Request $request,$fechain,$fechafin)
    {
        if($request->ajax()){
        $cliente = Vitacora::consulta($fechain,$fechafin);
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
