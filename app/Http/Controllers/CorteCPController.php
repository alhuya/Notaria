<?php

namespace Notaria\Http\Controllers;

use Illuminate\Http\Request;
use DB; 
use Notaria\CorteDependencias;
use Illuminate\Support\Facades\Auth;

class CorteCPController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response 
     */
    public function index() 
    {
        $hoy = date("Y-m-d"); 
     
       $Dependencias = DB::table('pagos_dependencias')       
        ->select('pagos_dependencias.*')
        ->get();
       

        $pagosdependencias = DB::table('pagos_dependencias')       
        ->where('pagos_dependencias.fecha', '=',  $hoy)
        ->select('pagos_dependencias.*')
        ->get();
 
        
      
        $suma = 0; 
        foreach($pagosdependencias as $pagosdependencia){
          $var=  $pagosdependencia->cantidad;
          $suma += $var;

        }
        $puesto = Auth::user()->puesto_id;
               
       
        $conceptos = DB::table('menu_concepto')
         ->where('menu_concepto.puesto_id', '=', $puesto)//se optiene las categorias segun el puesto
         ->select('menu_concepto.*')
         ->get();
 
         $funciones = DB::table('menu')
         ->where('menu.puesto_id', '=', $puesto)//se optiene las funciones del menu segun el puesto
         ->select('menu.*')
         ->get();

        
       


        return view('/corte_cp',compact('Dependencias','suma','funciones','conceptos'));
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
        
        $consulta =DB::table('corte_cp_dep')
        -> where('corte_cp_dep.fecha', '=', $hoy)
        ->select('corte_cp_dep.*')
        ->get();
        
        if ($consulta->isEmpty()) { 
            $cortedep = new CorteDependencias ;
            $cortedep->fecha = $hoy ;
            $cortedep->total = $request->input('total');
            $cortedep->comentario = $request->input('comentario');
            $cortedep->save();
            return redirect('/corte_cp')->with('status','Corte Guardado Exitosamente ');


        }
        else{

            return redirect('/corte_cp')->with('status2','El corte ya se realizo ');

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
