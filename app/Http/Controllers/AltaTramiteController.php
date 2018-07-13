<?php

namespace Notaria\Http\Controllers;
 
use Illuminate\Http\Request;
use Notaria\Documentacion; 
use Notaria\TiposTramites;
use Notaria\tramite_documento;
 
class AltaTramiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documentos = Documentacion::all();
        return view('alta_tramite', compact('documentos'));
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
