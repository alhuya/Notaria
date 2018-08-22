<?php

namespace Notaria\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use DB;

use Illuminate\Http\Request;
use Notaria\TiposTramites;
use Notaria\tramite_documento;

class EliminarTramiteController extends Controller
{
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Tramites = TiposTramites::all();


        $puesto = Auth::user()->puesto_id;
               
       
       $conceptos = DB::table('menu_concepto')
        ->where('menu_concepto.puesto_id', '=', $puesto)
        ->select('menu_concepto.*')
        ->get();

        $funciones = DB::table('menu')
        ->where('menu.puesto_id', '=', $puesto)
        ->select('menu.*')
        ->get();
        return view('eliminar_tramite', compact('Tramites','conceptos','funciones'));
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
    public function store(Request $request,$id)
    {
        if($request->ajax()){
            $tramites = TiposTramites::tramite($id);
            return response()->json($tramites);
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
    public function destroy(Request $request)
    {
        $id = $request->input('tramite');

        $consulta = DB::table('control_tramites')
        ->where('control_tramites.tramite_id', '=', $id)
        ->select('control_tramites.*')
        ->get();

        if ($consulta->isEmpty()) {
        $tramite = TiposTramites::find($id);
        $tramite->delete();

        $doc = tramite_documento::where('tipo_tramite_id',$id);//eliminar fila del modelo tramite_documento segun el id
        $doc->delete();
       return redirect('/eliminar_tramite')->with('status','Tramite eliminado exitosamente');
        }
        else{
            return redirect('/eliminar_tramite')->with('status2','No se puede eliminar el cliente ');
        }
    }
}
