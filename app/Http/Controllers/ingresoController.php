<?php

namespace Notaria\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use DB;
use Notaria\Dependencias;
use Notaria\ControlTramites;
use Notaria\ProyectoDependencia;
class ingresoController extends Controller

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
 
        return view('/ingreso', compact('numeros','dependencias','funciones','conceptos')); 
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
            $proyecto = new ProyectoDependencia ;
            $proyecto->fecha_ingreso = $request->input('fecha');
            $proyecto->numero_folio = $request->input('numero');
            $proyecto->dependencia = $request->input('dependencia');
            $proyecto->save();
            
            return redirect('/ingreso')->with('status','Ingreso a Dependencia');
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
