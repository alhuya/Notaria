<?php

namespace Notaria\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Notaria\Concepto; 
use Notaria\ControlTramites; 
use Notaria\CostoTramite;
use Notaria\Presupuesto;
use Notaria\ElaboracionPresupuesto;
use Notaria\PresupuestoConsulta;
use Notaria\RecepcionPagos;
use DB;

class RecepcionPagosController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index()
    { 
       
       
        $Tramites = DB::table('presupuestos')       
        -> where('estatus', '=', 'Autorizado')
        ->select('presupuestos.*')
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
      

        return view('/recepcion_pagos', compact('Tramites','conceptos','funciones'));
       
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
        $carpeta = $request->input('carpeta');

        $recepcion = DB::table('recepcion_pagos')->where('carpeta_id', '=', $carpeta)->delete();

        $hoy = date("y-m-d");
        
        $hora = date("H:i:s");
       
        $pagos = $request->input('pago');
        $tipos = $request->input('tipo'); 
        $cuentas = $request->input('cuenta'); 
        $concept = $request->input('concepto');  

      $consultas = DB::table('presupuestos')         
            ->where('carpeta_id', '=', $carpeta)
            ->select('presupuestos.*')
            ->get();

        $id;
        $c;
        foreach($consultas as $consulta){
            $id =$consulta ->presupuesto_id;
            $c= $consulta ->cliente_id;
    } 

    

    
        foreach ($concept as $key => $value){ 
     
        $cliente = new RecepcionPagos;
        $cliente->cliente_id = $c;
        $cliente->presupuesto_id = $id;
        $cliente->carpeta_id = $carpeta;
        $cliente->concepto_id= $concept[$key];
        $cliente->cantidad = $pagos[$key];
        $cliente->tipo_pago =   $tipos[$key];
        $cliente->fecha = $hoy;
        $cliente->hora = $hora;
        $cliente->deposito_cuenta =  $cuentas[$key];
 
      
     
        $cliente->save();
        }
        return redirect('/recepcion_pagos')->with('status','Pago guardado exitosamente');

    
    
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
