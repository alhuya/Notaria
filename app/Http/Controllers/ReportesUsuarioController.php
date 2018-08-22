<?php

namespace Notaria\Http\Controllers;

use Illuminate\Http\Request;
 
use Illuminate\Support\Facades\Auth;
use DB;
use Notaria\UsActivos;
use Notaria\UsInactivos;
use Notaria\allUs;
class ReportesUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $puesto = Auth::user()->puesto_id;
               
       
        $conceptos = DB::table('menu_concepto')
         ->where('menu_concepto.puesto_id', '=', $puesto)
         ->select('menu_concepto.*')
         ->get();
 
         $funciones = DB::table('menu')
         ->where('menu.puesto_id', '=', $puesto)
         ->select('menu.*')
         ->get();
 
         return view('/reportes_usuario', compact('conceptos','funciones')); 
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
    public function store1(Request $request)
    {
        if($request->ajax()){
        $cliente1 = UsActivos::activos();
        return response()->json($cliente1); 
      }
    }

    public function store2(Request $request)
    {
        if($request->ajax()){
        $cliente2 = UsInactivos::inactivo();
        return response()->json($cliente2); 
      }
    }

    public function store3(Request $request)
    {
        if($request->ajax()){
        $cliente3 = allUs::todos();
        return response()->json($cliente3); 
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
