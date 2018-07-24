<?php

namespace Notaria\Http\Controllers;
use Illuminate\Http\Request;
use Notaria\TiposTramites; 
use Notaria\TramitesAbogados;
use Notaria\User;   



class TramiteAbogadoController extends Controller 
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $usuarios = User::orderBy('id', 'desc')->take(1)->get();
      // dd($usuarios);
        $tramites = TiposTramites::all();
        return view('/tramite_abogado', compact('tramites','usuarios'));
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

        $TramitesId = $request->input('tramid'); 
        $tramid;
        foreach ($TramitesId as $tramiteId) {
            $tramid=  $tramiteId;   
            $tramdoc = new TramitesAbogados;
            $tramdoc->tipo_tramite_id = $request->input('nombre');
            $tramdoc->usuario_id =$tramid;   
            $tramdoc->save();  
        } 
 

  return redirect('/asignar_horario_laboral'); 
        
  
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
