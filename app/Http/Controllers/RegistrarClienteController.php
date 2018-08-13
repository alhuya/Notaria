<?php

namespace Notaria\Http\Controllers; 

use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;
use Notaria\Estados;
use Notaria\Clientes;
use Notaria\Municipios;
use Notaria\Estados_Municipios;
use DB;

class RegistrarClienteController extends Controller
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
       
        $estados = Estados::all();
        return view('registrar_cliente', compact('estados','conceptos','funciones'));
        
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

     $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido_paterno' => 'required|string|max:255',
            'ap_materno' => 'required|string|max:255',
            'telefono' => 'required|numeric |digits:10',
            'celular' => 'required|numeric|digits:10',
            'email' => 'required|string|email|max:255',
            'calle' => 'required|string|max:255',
            'col_fracc' => 'required|string|max:255', 
            'numero_interior' => 'string',
            'numero_exterior' => 'required|numeric',
            'codigo_postal' => 'required|numeric',
            
           

        ]);
   
 
      $cliente = new Clientes;
      $cliente->nombre = $request->input('nombre');
      $cliente->apellido_paterno = $request->input('apellido_paterno');
      $cliente->apellido_materno = $request->input('ap_materno');
      $cliente->telefono = $request->input('telefono');
      $cliente->celular= $request->input('celular');
      $cliente->correo= $request->input('email');
      $cliente->calle= $request->input('calle');
      $cliente->colonia= $request->input('col_fracc');
      $cliente->numero_interior= $request->input('numero_interior'); 
      $cliente->numero_exterior= $request->input('numero_exterior');
      $cliente->codigo_postal= $request->input('codigo_postal');
      $cliente->estado_id= $request->input('estado');
      $cliente->municipio_id= $request->input('municipio');
   
      $cliente->save();
      return redirect('/registrar_cliente')->with('status','Cliente guardado exitosamente');
    }

    public function store2(Request $request,$id)
    {
     if($request->ajax()){ 
        $municipios = Estados_Municipios::estmun($id); 
        return response()->json($municipios);
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
