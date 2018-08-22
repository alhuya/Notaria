<?php

namespace Notaria\Http\Controllers;
use Illuminate\Support\Facades\Auth; 
use DB;  

use Illuminate\Http\Request;
use Notaria\Clientes;
use Notaria\Citas;

class ConsultaClienteController extends Controller 
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response 
     */
    public function index() 
    {
        $clientes = Clientes::all();
        $puesto = Auth::user()->puesto_id;//Se optiene el puesto_id del usuario logueado
               
       
        $conceptos = DB::table('menu_concepto')
         ->where('menu_concepto.puesto_id', '=', $puesto)//se optiene las categorias del menu
         ->select('menu_concepto.*')
         ->get();
 
         $funciones = DB::table('menu')
         ->where('menu.puesto_id', '=', $puesto)//se optiene las fucniones del menu
         ->select('menu.*')
         ->get();
        return view('consulta_cliente', compact('clientes','conceptos','funciones'));
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
        $cliente = Clientes::clientes($id);// se optienen la respuesta del modelo clientes 
        return response()->json($cliente);
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
