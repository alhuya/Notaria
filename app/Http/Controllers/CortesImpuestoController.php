<?php

namespace Notaria\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Notaria\CorteImpuestos;
use DB;

class CortesImpuestoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {  $hoy = date("Y-m-d"); 
     
        $Impuestos = DB::table('pago_impuestos')       
         ->select('pago_impuestos.*')
         ->get();
        
 
         $pagosimpuestos = DB::table('pago_impuestos')       
         ->where('pago_impuestos.fecha', '=',  $hoy)
         ->select('pago_impuestos.*')
         ->get();
  
         
       
         $suma = 0; 
         foreach($pagosimpuestos as $pagosimpuesto){
           $var=  $pagosimpuesto->cantidad;
           $suma += $var;
 
         }

         $puesto = Auth::user()->puesto_id;
               
       
         $conceptos = DB::table('menu_concepto')
          ->where('menu_concepto.puesto_id', '=', $puesto)
          ->select('menu_concepto.*')
          ->get();
  
          $funciones = DB::table('menu')
          ->where('menu.puesto_id', '=', $puesto)
          ->select('menu.*')
          ->get();
        
 
 
         return view('/corteimp',compact('Impuestos','suma','funciones','conceptos'));
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
        $hoy = date("Y-m-d"); ;
        
        $consulta =DB::table('corte_cp_im')
        -> where('corte_cp_im.fecha', '=', $hoy)
        ->select('corte_cp_im.*')
        ->get(); 
        
        if ($consulta->isEmpty()) { //si el corte del dia no se a realizado nos deja hacer el insert
            $cortedep = new CorteImpuestos ;
            $cortedep->fecha = $hoy ;
            $cortedep->total = $request->input('total');
            $cortedep->comentario = $request->input('comentario');
            $cortedep->save();
            return redirect('/corteimp')->with('status','Corte Guardado Exitosamente ');


        }
        else{

            return redirect('/corteimp')->with('status2','El corte ya se realizo ');

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
