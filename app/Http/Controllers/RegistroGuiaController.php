<?php

namespace Notaria\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Notaria\ControlTramites;
use Notaria\TiposTramites;
use DB;
class RegistroGuiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index() 
    {
        $Tramites = ControlTramites::all();
        $Tipos = TiposTramites::all();

      
        $numeros = DB::table('control_tramites')
        -> orderBy('id', 'desc')
        -> take(1)
        ->select('control_tramites.numero_escritura') 
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


        return view('/registro_guia', compact('Tramites','Tipos','numeros','conceptos','funciones')); 
         
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
         
            'escritura' => 'required|numeric',
            'volumen' => 'required|numeric',
            'folio1' => 'required|numeric',
            'folio2' => 'required|numeric',
          

        ]);

        $id = $request->input('carpeta'); 

        $consulta = DB::table('control_tramites')
        ->where('carpeta_id','=', $id )       
        ->select('control_tramites.numero_escritura')
        ->get(); 

        if ($consulta->isEmpty()) {
     
 
      $control = new ControlTramites;
      $control->numero_escritura = $request->input('escritura'); 
      $control->fecha = $request->input('fecha');
      $control->volumen = $request->input('volumen'); 
      $control->folio1 = $request->input('folio1');
      $control->folio2= $request->input('folio2'); 
      $control->otorgantes= $request->input('otorgantes');
      $control->contrato= $request->input('contrato');
   
      $control->save();
      return redirect('/registro_guia')->with('status','Se guardo con exito');
        }

        else{

     return redirect('/registro_guia')->with('status2','Ya se tiene el registro');
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
        $id = $request->input('carpeta'); 

        $consulta = DB::table('control_tramites')
        ->where('carpeta_id','=', $id )       
        ->select('control_tramites.numero_escritura')
        ->get(); 
 
    
        ControlTramites::where('carpeta_id',$id)->first()->update($request->all()); 
 
    /*    DB::table('control_tramites')
        ->where('carpeta_id','=', $id)
        ->update(['revision' => $rev]);
*/

        return redirect('/registro_guia')->with('status','Se guardo exitosamente');
       
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
