<?php

namespace Notaria\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Notaria\Corte;
use Illuminate\Support\Facades\Auth;
class CortesController extends Controller
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
        $hoy = date("Y-m-d"); 
       
       
        $pagos = DB::table('recepcion_pagos')   
        ->leftJoin('control_tramites', 'recepcion_pagos.carpeta_id', '=', 'control_tramites.carpeta_id')
        ->leftJoin('conceptos_costos', 'recepcion_pagos.concepto_id', '=', 'conceptos_costos.concepto_costo_id')    
        ->where('recepcion_pagos.fecha', '=',  $hoy)
        ->where('recepcion_pagos.cantidad', '>', 0 )
        ->select('recepcion_pagos.*','control_tramites.numero_escritura','conceptos_costos.concepto','control_tramites.cliente_id')
        ->get();

        
        
        $suma = 0; 
        foreach($pagos as $pago){
          $var=  $pago->cantidad;
          $suma += $var;

        }
     
       
        return view('/cortes', compact('pagos','suma','conceptos','funciones'));
      
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
        $id = $request->input('cliente');
        
        $consulta =DB::table('cortes')
        -> where('cortes.cliente_id', '=', $id)
        ->select('cortes.*')
        ->get();
        
        if ($consulta->isEmpty()) { 
            $corte = new Corte ;
            $corte->cliente_id = $request->input('cliente');
            $corte->presupuesto_id = $request->input('presupuesto');
            $corte->fecha = $request->input('fecha');
            $corte->tipo_pago = $request->input('tipo_pago');
            $corte->ingreso_trasferencia = $request->input('deposito_cuenta');
            $corte->total = $request->input('total');
            $corte->vale= $request->input('vale');
            $corte->comentarios = $request->input('comentario');
            $corte->save();
            return redirect('/cortes')->with('status','Corte Guardado Exitosamente ');


        }
        else{

            return redirect('/cortes')->with('status2','El corte ya se realizo ');

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
