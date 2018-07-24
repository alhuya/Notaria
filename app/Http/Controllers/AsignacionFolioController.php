<?php

namespace Notaria\Http\Controllers;

use Illuminate\Http\Request;
use Notaria\ValidaDocumentosAbogado;
use Notaria\Citas;
use DB;
use Notaria\ControlTramites;

class AsignacionFolioController extends Controller
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
        return view('asignacion_folio', compact('citas','clientes'));
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
    public function store(Request $request ,$id)
    { 
        if($request->ajax()){
        $doc = ControlTramites::tramite($id);
        return response()->json($doc); 
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