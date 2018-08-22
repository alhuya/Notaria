<?php

namespace Notaria\Http\Controllers;
 
use Illuminate\Http\Request;
 
use Notaria\Concepto; 
use Notaria\ControlTramites; 
use Notaria\CostoTramite;
use Notaria\Presupuesto; 
use Notaria\ElaboracionPresupuesto;
use Notaria\PresupuestoConsulta;
use DB;

 
class PresupuestoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index() 
    { 
       
        $conceptos = Concepto::all(); 
        $valores = CostoTramite::all(); 
        $Tramites = ControlTramites::all(); 
        
 

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

              

        return view('/presupuesto', compact('Tramites','valores','Costos','funciones','conceptos'));
       
        
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
    public function store(Request $request,$numero)
    {
        if($request->ajax()){ 
            $cli = PresupuestoConsulta::var($numero);
            return response()->json($cli); 
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
