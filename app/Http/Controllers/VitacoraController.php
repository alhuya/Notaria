<?php

namespace Notaria\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB; 
use Notaria\Clientes; 
use Notaria\Vitacora; 
class VitacoraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Clientes::all();
        $puesto = Auth::user()->puesto_id;
               
       
       $conceptos = DB::table('menu_concepto')
        ->where('menu_concepto.puesto_id', '=', $puesto)
        ->select('menu_concepto.*')
        ->get();

        $funciones = DB::table('menu')
        ->where('menu.puesto_id', '=', $puesto)
        ->select('menu.*')
        ->get();

        return view('/Bitacora', compact('clientes','conceptos','funciones'));
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
      

        $hoy = date("Y-m-d"); 
   
 
      $cliente = new Vitacora;
      $cliente->fecha = $hoy;
      $cliente->nombre = $request->input('nombre');
      $cliente->apellido_paterno = $request->input('apellido_paterno');
      $cliente->apellido_materno = $request->input('apellido_materno');
      $cliente->telefono = $request->input('telefono');
      $cliente->celular= $request->input('celular');
      $cliente->tipo= $request->input('tipo');   
      $cliente->save();
      return redirect('/Bitacora')->with('status','Cliente guardado en Bitacora');
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
