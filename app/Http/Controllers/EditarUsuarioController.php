<?php

namespace Notaria\Http\Controllers;
use Illuminate\Http\Request; 
use Notaria\User;



class EditarUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $usuarios = User::all();
        return view('editar_usuario', compact('usuarios'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
     /*   $usuarios = User::all();

        return view('editar_usuario', compact('usuarios'));
  */

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
        $usuarios = User::usuarios($id);
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
        
            User::where('id',$id)->first()->update($request->all());
            return redirect('/eliminar_usuario')->with('status','Usuario editado exitosamente');

        /* $usuarios = new User;
         $usuarios->nombre = $request->input('nombre');
         $usuarios->ap_paterno = $request->input('ap_paterno');
         $usuarios->ap_materno = $request->input('ap_materno');
         $usuarios->email = $request->input('correo');
         $usuarios->puesto = $request->input('puesto');
         $usuarios->abogado = 'no';
         $usuarios->save();
        return redirect('/eliminar_usuario')->with('status','Puesto guardado exitosamente');
        */
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
