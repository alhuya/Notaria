<?php

namespace Notaria\Http\Controllers;
 
use Illuminate\Http\Request;
use Notaria\ValidaDocumentosAbogado; 
use DB;
use Notaria\ControlTramites; 



class AperturaCarpetasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */  
    public function index()
     
    {
// $idPuesto =  $puestos->select('id','nombre')->where('nombre', '=', $nom)->get();
       /* $tramites =   DB::table('control_tramites')
        ->select ('control_tramites.carpeta_id')
        ->get();*/
  

        
        

        //dd($tramites);
        $clientes = DB::table('clientes')
        ->select('clientes.*')
        ->get();

        $tramites = DB::table('tipos_tramites')
        ->select('tipos_tramites.*')
        ->get();

        $numeros = DB::table('control_tramites')
        -> orderBy('id', 'desc')
        -> take(1)
        ->select('control_tramites.*') 
        ->get();


   
        
        return view('apertura_carpetas', compact('clientes','tramites','numeros')); 
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
      
    $validar = new ControlTramites ;
    $validar->carpeta_id = $request->input('numero');
    $validar->cliente_id =$request->input('cliente');
    $validar->tramite_id= $request->input('tramite');
    $validar->save();
         
    return redirect('/apertura_carpetas')->with('status','Tramite guardado exitosamente');
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
