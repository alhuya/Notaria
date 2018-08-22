<?php

namespace Notaria\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Notaria\puestos; 
use Notaria\categoriaPuesto; 
use DB;


class AsignarFuncionesController extends Controller
{
    /**
     * Display a listing of the resource. 
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
         $puestos = puestos::all();//se optiene todos los puestos
         $puesto = Auth::user()->puesto_id;// se optiene el puesto_id del usuario logueado
               
       
         $conceptos = DB::table('menu_concepto')
          ->where('menu_concepto.puesto_id', '=', $puesto)
          ->select('menu_concepto.*')
          ->get();
  
          $funciones = DB::table('menu')
          ->where('menu.puesto_id', '=', $puesto)
          ->select('menu.*')
          ->get();
           return view('asignar_funciones', compact('puestos','funciones','conceptos'));
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
        $usuarios = categoriaPuesto::categoria($id);//se pide la respuesta del modelo categoriapuesto de la fucnion categoria
        return response()->json($usuarios);
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
