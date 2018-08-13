<?php

namespace Notaria\Http\Controllers;

use Illuminate\Http\Request;
use Notaria\PagoImpuesto;
use Illuminate\Support\Facades\Auth;
use DB;

class ControlPagoImpuestosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 

        $puesto = Auth::user()->puesto_id;
               
       
       $conceptos = DB::table('menu_concepto')
        ->where('menu_concepto.puesto_id', '=', $puesto)
        ->select('menu_concepto.*')
        ->get();

        $funciones = DB::table('menu')
        ->where('menu.puesto_id', '=', $puesto)
        ->select('menu.*')
        ->get();

        return view('/control_pago_impuestos',compact('funciones','conceptos'));
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
     * @return \Illuminate\Http\Response register
     */
    public function store(Request $request) 
    {

        $request->validate([
            'impuesto' => 'required|string|max:255',
            'cantidad' => 'required|numeric',
            'cuenta' => 'required|numeric',
            'entrega' => 'required|string|max:255',    

        ]); 
        
        $hoy = date("y-m-d");
   
 
        $Impuestos = new PagoImpuesto ;  
        $Impuestos->fecha = $hoy; 
        $Impuestos->impuesto = $request->input('impuesto');
        $Impuestos->cantidad = $request->input('cantidad');
        $Impuestos->tipo_pago = $request->input('tipo_pago');
        $Impuestos->cuenta= $request->input('cuenta');
        $Impuestos->entrega= $request->input('entrega');   
        $Impuestos->save();
        return redirect('/control_pago_impuestos')->with('status','Pago de Impuesto Guardado');
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
