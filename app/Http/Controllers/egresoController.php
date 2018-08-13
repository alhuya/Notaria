<?php

namespace Notaria\Http\Controllers;

use Illuminate\Http\Request;
use Notaria\Dependencias;
use Notaria\ControlTramites;
use Notaria\ProyectoDependencia;
use Illuminate\Support\Facades\Auth;
use DB;
class egresoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $dependencias = Dependencias::all();
        $numeros = ControlTramites::all();

        $puesto = Auth::user()->puesto_id;
               
       
        $conceptos = DB::table('menu_concepto')
         ->where('menu_concepto.puesto_id', '=', $puesto)
         ->select('menu_concepto.*')
         ->get();
 
         $funciones = DB::table('menu')
         ->where('menu.puesto_id', '=', $puesto)
         ->select('menu.*')
         ->get();
 
        return view('/egreso', compact('numeros','dependencias','funciones','conceptos')); 
 
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
            $documentos = ProyectoDependencia::proydep($id);
            return response()->json($documentos);
          }
    }
    public function store2(Request $request)
    {
      
        
            $fechain = $request->input('fecha_ingreso');
            $folio = $request->input('numero_folio');
            $dependencia = $request->input('dependencia');
            $fechaegr = $request->input('fecha_egreso');


            DB::table('proyecto_dependencia')->where('numero_folio', '=',  $folio )->delete();

            foreach ($fechain as $key => $value){ 
               

            $proyecto = new ProyectoDependencia ;
            $proyecto->fecha_ingreso = $fechain[$key];
            $proyecto->numero_folio = $folio[$key];
            $proyecto->dependencia = $dependencia[$key];
            $proyecto->fecha_egreso = $fechaegr[$key];
            $proyecto->save();

            }
        
            return redirect('/egreso')->with('status','Ingreso a Dependencia');
    
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
