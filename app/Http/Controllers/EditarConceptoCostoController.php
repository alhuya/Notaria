<?php

namespace Notaria\Http\Controllers;

use Illuminate\Http\Request;
use Notaria\TiposTramites;
use Notaria\CostoTramite;
use Notaria\Concepto; 
use Notaria\ConceptoCosto2;
use Notaria\ConceptoCosto;
use DB;
use Notaria\Clientes;

class EditarConceptoCostoController extends Controller
{
    /**
     * Display a listing of the resource. 
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
              
        $Costos = CostoTramite::all();
        $tramites = TiposTramites::all();
        $conceptos = Concepto::all();
        return view('editar_concepto_costo', compact('tramites','Costos','conceptos'));
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
        //
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
        $tipo = $request->input('costo_tramite_id');
        $tramite = $request->input('tramite_id');
        
        $consultas = DB::table('conceptos_costos')
        ->where('costo_tramite_id', '=',  $tipo)
        ->where('tramite_id', '=',  $tramite)
        ->select( 'conceptos_costos.*')
        ->get(); 
        
        
        $id;
        foreach($consultas as $consulta){
            $id=$consulta->concepto_costo_id;
        }
        

        $costos = $request->input('costo');
        
        $var; 
        foreach ($costos as $costo ) { 
            $var   = $costo;  
            

            DB::table('conceptos_costos')
            ->where('concepto_costo_id',$id )
            ->where('costo_tramite_id', $tipo)
            ->where('tramite_id', $tramite)
            ->update(['costo' => $var]);
           
        }
        return redirect('/editar_concepto_costo')->with('status','Tarifa editada exitosamente');




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
