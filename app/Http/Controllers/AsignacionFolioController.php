<?php

namespace Notaria\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Notaria\ValidaDocumentosAbogado;
use Notaria\Citas;
use Notaria\Clientes;
use DB;
use Notaria\ControlTramites;
use Notaria\ControlTramitesFolio;
use Notaria\GuiaCliente;

class AsignacionFolioController extends Controller
{
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Clientes::all();//optener todos los clientes
        $carpetas = ControlTramites::all();//optener todo de la tabla control tramites
        $puesto = Auth::user()->puesto_id;//optener el puesto_id del usuario logueado
               
       
        $conceptos = DB::table('menu_concepto')
         ->where('menu_concepto.puesto_id', '=', $puesto)//optiene las categorias de menu
         ->select('menu_concepto.*')
         ->get();
 
         $funciones = DB::table('menu')
         ->where('menu.puesto_id', '=', $puesto)
         ->select('menu.*')
         ->get();
        return view('asignacion_folio', compact('citas','clientes','carpetas','funciones','conceptos'));
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
    public function store(Request $request ,$cliente,$carpeta)
    { 
        if($request->ajax()){ 
        $doc = ControlTramitesFolio::tramite($cliente,$carpeta);
        return response()->json($doc); 
      }
    
    

    
    } 

    public function store2(Request $request ,$cliente)
    { 
        if($request->ajax()){ 
        $doc = GuiaCliente::cliente($cliente);//se solicitan los datos del modelo GuiaCliente
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
