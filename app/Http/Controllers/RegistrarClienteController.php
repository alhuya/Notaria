<?php

namespace Notaria\Http\Controllers; 

use Illuminate\Http\Request; 
use Notaria\Estados;
use Notaria\Clientes;
class RegistrarClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 

        $estados = Estados::all();
        return view('registrar_cliente', compact('estados'));
        
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
    /*  if($request->ajax()){
        $estados = Estados::estados($id);
        return response()->json($estados);
      }*/
 
      $cliente = new Clientes;
      $cliente->nombre = $request->input('nombre');
      $cliente->apellido_paterno = $request->input('ap_paterno');
      $cliente->apellido_materno = $request->input('ap_materno');
      $cliente->telefono = $request->input('telefono');
      $cliente->celular= $request->input('celular');
      $cliente->correo= $request->input('email');
      $cliente->calle= $request->input('calle');
      $cliente->colonia= $request->input('col_fracc');
      $cliente->numero_interior= $request->input('num_int');
      $cliente->numero_exterior= $request->input('num_ext');
      $cliente->codigo_postal= $request->input('cod_post');
      $cliente->estado_id= $request->input('estado');
      $cliente->municipio_id= $request->input('municipio');
   
      $cliente->save();
      return redirect('/registrar_cliente')->with('status','Cliente guardado exitosamente');
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
