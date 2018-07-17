<?php

namespace Notaria\Http\Controllers;

use Illuminate\Http\Request;
use Notaria\TiposTramites;
use Notaria\Documentacion;
use Notaria\tramite_documento;
<<<<<<< HEAD
=======
use DB;
>>>>>>> 010358105f0879f78bb4a6dc6c285e4c135efab0

class DocumentacionTramiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index()
    {   

        $documentos = Documentacion::all();
        $tramites = TiposTramites::all();
        $tamdoc = tramite_documento::all();
        return view('Documentacion_tramite', compact('tramites','documentos','tramdoc'));
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
        $doc = tramite_documento::consult($id);
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
