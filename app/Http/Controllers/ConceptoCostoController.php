<?php

namespace Notaria\Http\Controllers; 

use Illuminate\Http\Request; 
use Notaria\Concepto; 
use Notaria\ConceptoCosto;
use Notaria\CostoTramite;
use Notaria\TiposTramites;

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
        $conceptos = Concepto::all();
        return view('concepto_costo', compact('conceptos','Costos','tramites'));
       
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


        $documentosId = $request->input('docId');
        $docID;
        $docID2;
        

        $documentosId2 = $request->input('costo');
        

        foreach (array_combine($documentosId2, $documentosId) as $documentoId2 => $documentoId ) { 
            $docID2   =    $documentoId2;  
            $docID=  $documentoId;   
            
            $concepto = new ConceptoCosto;
            $concepto->costo_tramite_id = $request->input('tipo'); 
            $concepto->concepto = $docID;
            $concepto->costo = $docID2;
            $concepto->tramite_id = $request->input('tramite'); 

            $concepto->save();
       }
        
       
            return redirect('/concepto_costo')->with('status',' guardado exitosamente'); 

       
        
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
