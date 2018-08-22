<?php

namespace Notaria\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use DB;
use Notaria\ControlTramites;
use Notaria\Presupuesto;
use Notaria\RecepcionPagos;

class EditaPresupuestoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response 
     */
    public function index()
    {
        $Tramites = ControlTramites::all();
       
        $puesto = Auth::user()->puesto_id;//se optiene el puesto_id del usuario logueado
               
        
        $conceptos = DB::table('menu_concepto')
         ->where('menu_concepto.puesto_id', '=', $puesto)
         ->select('menu_concepto.*')
         ->get();
 
         $funciones = DB::table('menu')
         ->where('menu.puesto_id', '=', $puesto)
         ->select('menu.*')
         ->get();

        $Carpetas = DB::table('presupuestos')
         ->leftJoin('control_tramites', 'presupuestos.carpeta_id', '=', 'control_tramites.carpeta_id')
         ->select('presupuestos.*')
         ->get();

         
        return view('edita_presupuesto', compact('funciones','conceptos','Tramites','Carpetas'));  
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

         $pagos= DB::table('recepcion_pagos')
         ->where('recepcion_pagos.carpeta_id', '=', 2 )
         ->select('recepcion_pagos.cantidad')
         ->get();

       
         foreach($pagos as $pago){           
           
         if ( $pago->cantidad > 0){

            return redirect('/edita_presupuesto')->with('status',' No se puede editar el presupuesto porque ya se han realizado pagos'); 


            }
        if ( $pago->cantidad == 0){

        $id = $request->input('carpeta');
        $costo_id = $request->input('tipo'); 

        $clientes = DB::table('control_tramites')
        ->join('clientes', 'control_tramites.cliente_id', '=', 'clientes.id')
        ->join('tipos_tramites', 'control_tramites.tramite_id', '=', 'tipos_tramites.id')
        ->where('control_tramites.carpeta_id', '=', $id)
        ->select('control_tramites.*','clientes.nombre','clientes.apellido_paterno','clientes.apellido_materno','tipos_tramites.tramite')
        ->get();

         $client;
         $tipo;
         foreach($clientes as $cliente){

            $client = $cliente->cliente_id; 
            $tipo = $cliente->tramite_id; 
            
         }

        
            DB::table('presupuestos')
            ->where('carpeta_id', $id)
            ->update(['cliente_id' => $client , 'costo_tramite_id' => $costo_id , 'carpeta_id' => $id, 'estatus' => 'pendiente']);

            DB::table('recepcion_pagos')->where('carpeta_id', '=', $id )->delete();

            $consultas2 = DB::table('presupuestos')
            ->where('presupuestos.carpeta_id', '=',$id )
            ->select('presupuestos.*')
            ->get();
    
         
              $prep_id;
            foreach($consultas2 as $consult){
    
               
                $prep_id = $consult->presupuesto_id;
            }

            DB::table('control_tramites')
            ->where('carpeta_id', $id)
            ->update(['presupuesto_id' =>  $prep_id ]);

            $hoy = date("d-m-y");
            $hora = date("H:i:s");


            $conceptos = DB::table('conceptos_costos')
            ->where('conceptos_costos.costo_tramite_id', '=',$costo_id)
            ->where('conceptos_costos.tramite_id', '=', $tipo)
            ->select('conceptos_costos.concepto_costo_id')
            ->get();

            foreach ($conceptos as $concepto){ 
     
                $cliente = new RecepcionPagos;
                $cliente->cliente_id = $client;
                $cliente->presupuesto_id = $prep_id;
                $cliente->carpeta_id = $id;
                $cliente->concepto_id= $concepto->concepto_costo_id;
                $cliente->cantidad = '0';
                $cliente->tipo_pago = '';
                $cliente->fecha = $hoy;
                $cliente->hora = $hora;
                $cliente->deposito_cuenta =  '';
                $cliente->save();
                }
 
                return redirect('/edita_presupuesto')->with('status','Presupuesto guardado exitosamente'); 

            }

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
    public function update(Request $request)
    {
        
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
