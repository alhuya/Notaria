<?php

namespace Notaria\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use DB;

use Illuminate\Http\Request;
use Notaria\Dependencias;
use Notaria\PagoDependencia;


class ControlPagoDependenciasController extends Controller
{
    /**
     * Display a listing of the resource. 
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
   {
    $Dependencias = Dependencias::all();
    
               
       
    $puesto = Auth::user()->puesto_id;
               
       
    $conceptos = DB::table('menu_concepto')
     ->where('menu_concepto.puesto_id', '=', $puesto)
     ->select('menu_concepto.*')
     ->get();

     $funciones = DB::table('menu')
     ->where('menu.puesto_id', '=', $puesto)
     ->select('menu.*')
     ->get();

     
      
        return view('/control_pago_dependencias',compact('Dependencias','conceptos','funciones'));
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
     
        $request->validate([
            'dependencia' => 'required|string|max:255',
            'entrega' => 'required|string|max:255',    

        ]); 
  
        $hoy = date("y-m-d");
   
 
      $Dependencia = new PagoDependencia ; 
      $Dependencia->fecha = $hoy;
      $Dependencia->dependencia = $request->input('dependencia');
      $Dependencia->cantidad = $request->input('cantidad');
      $Dependencia->tipo_pago = $request->input('tipo_pago');
      $Dependencia->entrega= $request->input('entrega');   
      $Dependencia->save();

      
      return redirect('/control_pago_dependencias')->with('status','Pago a Dependencia Guardado');
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
