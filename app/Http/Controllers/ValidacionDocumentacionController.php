<?php

namespace Notaria\Http\Controllers;

use Illuminate\Http\Request;
use Notaria\Clientes;
use Notaria\TiposTramites;
use Notaria\tramite_documento;

class ValidacionDocumentacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Clientes::all();
        $tramites = TiposTramites::all();
        return view('validacion_documentacion', compact('clientes','tramites'));
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tramites = new TiposTramites;
        $tramites->tramite = $request->input('tramite');
        $tramites->duracion = $request->input('tiempo');
   
        $tram = $tramites->tramite;
        

        $tramites->save();
       
        $idtramite =  $tramites->select('id','tramite')->where('tramite', '=', $tram)->get();
       
        $tramiteID;
        foreach ($idtramite as $idt) { 
             $tramiteID = $idt->id;             
        }
        //echo $puestoID;
        $documentosId = $request->input('docId');
        $docID;
        foreach ($documentosId as $documentoId) {
            $docID=  $documentoId;   
            $tramdoc = new tramite_documento;
            $tramdoc->tipo_tramite_id = $tramiteID;
            $tramdoc->documentacion_id = $docID;   
            $tramdoc->save(); 
        }
        return redirect('/alta_tramite')->with('status','Tramite guardado exitosamente'); 

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response 
     */
    public function store(Request $request,$id) 
    { 
        if($request->ajax()){
            $documentos = tramite_documento::consult($id);
            return response()->json($documentos);
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
