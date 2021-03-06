<?php

namespace Notaria\Http\Controllers;
use Illuminate\Http\Request; 
use Notaria\User;
use Notaria\puestos;
use Illuminate\Support\Facades\Auth;
use DB;



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
         $puestos = puestos::all();
         $puesto = Auth::user()->puesto_id;
               
       
         $conceptos = DB::table('menu_concepto')
          ->where('menu_concepto.puesto_id', '=', $puesto)
          ->select('menu_concepto.*')
          ->get();
  
          $funciones = DB::table('menu')
          ->where('menu.puesto_id', '=', $puesto)
          ->select('menu.*')
          ->get();
         
        return view('editar_usuario', compact('usuarios','puestos','funciones','conceptos'));

 
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
    public function store(Request $request , $id)
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
    public function update(Request $request){
        $id = $request->input('usuario'); 
        
            User::where('id',$id)->first()->update($request->all());//edita el usuario dependiendo del id
            return redirect('/editar_usuario')->with('status','Usuario editado exitosamente');

     
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
