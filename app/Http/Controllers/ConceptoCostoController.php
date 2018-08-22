<?php

namespace Notaria\Http\Controllers; 

use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;
use Notaria\Concepto; 
use Notaria\ConceptoCosto;
use Notaria\CostoTramite;
use Notaria\TiposTramites;
use DB;
class ConceptoCostoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    { 

        
        $tramites = TiposTramites::all();
        $Costos = CostoTramite::all(); 
        $variables = Concepto::all();
        $puesto = Auth::user()->puesto_id;
               
       
        $conceptos = DB::table('menu_concepto')
         ->where('menu_concepto.puesto_id', '=', $puesto)
         ->select('menu_concepto.*')
         ->get(); 
 
         $funciones = DB::table('menu')
         ->where('menu.puesto_id', '=', $puesto)
         ->select('menu.*')
         ->get();

        return view('concepto_costo', compact('variables','Costos','tramites','conceptos','funciones'));
       
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
      

        $tipo = $request->input('tipo');
        $tramite = $request->input('tramite');

       $consulta = DB::table('conceptos_costos')
        ->where('costo_tramite_id', '=',  $tipo) 
        ->where('tramite_id', '=',  $tramite)
        ->select( 'conceptos_costos.*')
        ->get();  
        
        if ($consulta->isEmpty()) {  
         
        $documentosId = $request->input('docId');
        $docID;
        $docID2;  
        
 
        $documentosId2 = $request->input('costo');
         

        foreach (array_combine($documentosId2, $documentosId) as $documentoId2 => $documentoId ) { 
            $docID2 = $documentoId2;  
            $docID = $documentoId;   
    //insert 
            $concepto = new ConceptoCosto;
            $concepto->costo_tramite_id = $request->input('tipo'); 
            $concepto->concepto = $docID;  
            $concepto->costo = $docID2;
            $concepto->tramite_id = $request->input('tramite'); 
            $concepto->save();
       }
        
       
            return redirect('/concepto_costo')->with('status',' guardado exitosamente'); 
    }
    else{

        return redirect('/concepto_costo')->with('status2',' Ya esta guardada la tarifa'); 
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
