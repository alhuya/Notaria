<?php

namespace Notaria\Http\Controllers;

use Illuminate\Http\Request;

use Notaria\ControlTramites;
use Notaria\ControlTramites2;
use Notaria\Kinegramas;
use Notaria\TramitesTerminados;
use Illuminate\Support\Facades\Auth;
use DB;
use Notaria\Entregas;
class EntregasController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      

       $Escrituras = DB::table('kinegramas')
        ->Join('control_tramites', 'kinegramas.id', '=', 'control_tramites.kinegrama_id')
        ->select('kinegramas.*','control_tramites.numero_escritura')
        ->get();
      

        $puesto = Auth::user()->puesto_id;
               
       
       $conceptos = DB::table('menu_concepto')
        ->where('menu_concepto.puesto_id', '=', $puesto)
        ->select('menu_concepto.*')
        ->get();

        $funciones = DB::table('menu')
        ->where('menu.puesto_id', '=', $puesto)
        ->select('menu.*')
        ->get();
        

         
        return view('Entregas', compact('Escrituras','conceptos','funciones'));
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
        $cliente = Entregas::valor($id);
        return response()->json($cliente); 
      }
    }
    public function store2(Request $request)
    {

        $nombre = $request->input('nombre_recibe'); 
        $fecha = $request->input('fecha_entrega');  
        $escritura = $request->input('escritura');  

        $tramites = DB::table('control_tramites')
        ->where('numero_escritura', $escritura)
        ->update(['fecha_entrega' =>   $fecha,'nombre_recibe' => $nombre]);
        

        $consultas =  DB::table('control_tramites')
        ->where('control_tramites.numero_escritura', '=', $escritura )
        ->select('control_tramites.*')
        ->get();        
 

    foreach($consultas as $consulta){
        $terminado = new TramitesTerminados;  
        $terminado->carpeta_id = $consulta->carpeta_id;
        $terminado->tramite_id = $consulta->tramite_id;
        $terminado->numero_escritura = $consulta->numero_escritura;
        $terminado->cliente_id = $consulta->cliente_id;    
        $terminado->fecha	 = $consulta->fecha	;          
        $terminado->volumen = $consulta->volumen;
        $terminado->folio1 = $consulta->folio1;
        $terminado->folio2 = $consulta->folio2;
        $terminado->otorgantes = $consulta->otorgantes;
        $terminado->contrato = $consulta->contrato;
        $terminado->presupuesto_id = $consulta->presupuesto_id;
        $terminado->dependencia_id = $consulta->dependencia_id;
        $terminado->tramite_dependencia_id = $consulta->tramite_dependencia_id;
        $terminado->revision = $consulta->revision;
        $terminado->kinegrama_id = $consulta->kinegrama_id;
        $terminado->terminado = $consulta->terminado;
        $terminado->fecha_entrega = $consulta->fecha_entrega;
        $terminado->nombre_recibe = $consulta->nombre_recibe;
       
        $terminado->save();

    } 

    DB::table('control_tramites')->where('numero_escritura', '=', $escritura)->delete();

    return redirect('/Entregas' )->with('status','Kinegrama agregado exitosamente');

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
