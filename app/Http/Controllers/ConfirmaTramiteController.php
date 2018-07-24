<?php

namespace Notaria\Http\Controllers;

use Illuminate\Http\Request;
use Notaria\ValidaDocumentosAbogado;
use Notaria\Citas;
use DB;
use  Notaria\TiposTramites;
use Notaria\tramite_documento; 
 
class ConfirmaTramiteController extends Controller 
{ 
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $clientes = DB::table('citas')
        ->leftJoin('clientes', 'citas.cliente_id', '=', 'clientes.id')
        ->select('citas.*', 'clientes.nombre','clientes.apellido_paterno','clientes.apellido_materno')
        ->get();
        $tramites = TiposTramites::all();
        return view('confirma_tramite', compact('clientes','tramites'));
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
    public function store(Request $request, $id)
    { 
        if($request->ajax()){
            $cliente = tramite_documento::consult($id);
            return response()->json($cliente); 
    }
} 
 
public function store2(Request $request) 
 {
    $documentosId = $request->input('docId');
        $docID;
        foreach ($documentosId as $documentoId) { 
            $docID=  $documentoId;   
    $validar = new ValidaDocumentosAbogado ;
    $validar->tipo_tramite = $request->input('tramite');
    $validar->cliente_id = $request->input('cliente');
    $validar->documentacion_id   = $docID;  
    $validar->comentario= $request->input('comentario');
    $validar->save();
        }
    return redirect('/confirma_tramite')->with('status','Tramite guardado exitosamente');
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
