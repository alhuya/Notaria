<?php

namespace Notaria\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Notaria\TiposTramites;
use Notaria\Documentacion;
use Notaria\tramite_documento;
use DB;

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

        $puesto = Auth::user()->puesto_id;
               
       
        $conceptos = DB::table('menu_concepto')
         ->where('menu_concepto.puesto_id', '=', $puesto)
         ->select('menu_concepto.*')
         ->get();
 
         $funciones = DB::table('menu')
         ->where('menu.puesto_id', '=', $puesto)
         ->select('menu.*')
         ->get();

        return view('Documentacion_tramite', compact('tramites','documentos','tramdoc','conceptos','funciones'));
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
