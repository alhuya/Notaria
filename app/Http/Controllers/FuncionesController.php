<?php

namespace Notaria\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Notaria\Menu;
use Notaria\menu_concepto;
use Illuminate\Support\Facades\Auth;


class FuncionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request ,$id,$puesto) 
  //public function index() 
    {
        $puestos = DB::table('puestos')
         -> where('puestos.id', '=', $puesto)
         ->select('puestos.*')
         ->get();
 
       $variables = DB::table('funciones')
       ->leftJoin('categorias_funciones', 'funciones.categoria_funcion_id', '=', 'categorias_funciones.id')
        -> where('funciones.categoria_funcion_id', '=', $id)
        ->select('funciones.*')
        ->get();
        $categorias = DB::table('categorias_funciones')
         -> where('categorias_funciones.id', '=', $id)
         ->select('categorias_funciones.*')
         ->get();

         $puesto = Auth::user()->puesto_id;
               
       
         $conceptos = DB::table('menu_concepto')
          ->where('menu_concepto.puesto_id', '=', $puesto)
          ->select('menu_concepto.*')
          ->get();
  
          $funciones = DB::table('menu')
          ->where('menu.puesto_id', '=', $puesto)
          ->select('menu.*')
          ->get();

         


      
        return view('/funciones', compact('funciones','categorias','puestos','conceptos','variables')); 
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
       
        $categoriasId = $request->input('funId');
          
        $catID;
        foreach ($categoriasId as $categoriaId) {
            $catID=  $categoriaId;   
            $f = new Menu;
            $f->puesto_id =  $request->input('puesto');
            $f->categoria_funcion_id = $request->input('categoria');   
            $f->funcion_id = $catID;   
            $f->save();  
             

        }    

          
        $m = new menu_concepto;
        $m->puesto_id =  $request->input('puesto');
        $m->categoria_funcion_id = $request->input('categoria');
        $m->save();  

        return redirect('/asignar_fuciones');
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
