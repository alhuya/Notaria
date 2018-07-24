<?php

namespace Notaria\Http\Controllers;

use Illuminate\Http\Request;
use Notaria\ControlTramites;
use Notaria\Kinegramas;


class EntregaKinegramasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  

        $Escrituras = ControlTramites::all();
        return view('entrega_kinegramas', compact('Escrituras'));
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
        $cliente = ControlTramites::cliente($id);
        return response()->json($cliente); 
      }
    }
    public function store2(Request $request)
    {
        $kinegrama = new Kinegramas;  
        $kinegrama->kinegrama = $request->input('kinegrama');
        $kinegrama->cliente_id = $request->input('cliente');
        $kinegrama->save();  
        return redirect('/entrega_kinegramas' )->with('status','Kinegrama agregado exitosamente');
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
         ControlTramites::where('numero_escritura',$id)->first()->update($request->all()); 
       

            return redirect('/entrega_kinegramas')->with('status2','Fecha Guardada Exitosamente');
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
 