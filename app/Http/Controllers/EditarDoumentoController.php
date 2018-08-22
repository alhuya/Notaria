<?php

namespace Notaria\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use DB;

use Illuminate\Http\Request; 
use Notaria\Documentacion;

class EditarDoumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response 
     */
    public function index()
    { 
        $Documentos = Documentacion::all();

        $puesto = Auth::user()->puesto_id;//puesto_id de la tabla user
               
       
        $conceptos = DB::table('menu_concepto')
         ->where('menu_concepto.puesto_id', '=', $puesto)
         ->select('menu_concepto.*')
         ->get();
 
         $funciones = DB::table('menu')
         ->where('menu.puesto_id', '=', $puesto)
         ->select('menu.*')
         ->get();
        return view('editar_documento', compact('Documentos','conceptos','funciones'));
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
            $documentos = Documentacion::doc($id);//se optiene la respuesta del modelo Documentacion
            return response()->json($documentos);
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
    public function update(Request $request)
    {

        $request->validate([
            'documento' => 'required|string|max:255',
            'costo' => 'required|numeric|max:255',
            'origen' => 'required|string|max:255',

        ]);

        $id = $request->input('documentos');
        
        Documentacion::where('id',$id)->first()->update($request->all());//actualizar dato
            return redirect('/editar_documento')->with('status','Documento editado exitosamente');
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
