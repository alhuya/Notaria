<?php
 
namespace Notaria\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Notaria\Citas;
use Notaria\CosultaCita;
use Notaria\Clientes;
use Notaria\TiposTramites;
use Notaria\TipoCitas;
use Illuminate\Support\Facades\Auth;




class EditarCitaController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {


        $usuarios = DB::table('users')
        ->leftJoin('puestos', 'users.puesto_id', '=', 'puestos.id')
        ->where('puestos.abogado', '=', 'si')
        ->select('users.*', 'puestos.abogado')
        ->get();

        $citas = Citas::all();// 
        $clientes = Clientes::all();
        $tramites = TiposTramites::all(); 
        $tipos = TipoCitas::all();

        $puesto = Auth::user()->puesto_id;
               
       
        $conceptos = DB::table('menu_concepto')
         ->where('menu_concepto.puesto_id', '=', $puesto)
         ->select('menu_concepto.*')
         ->get();
 
         $funciones = DB::table('menu')
         ->where('menu.puesto_id', '=', $puesto)
         ->select('menu.*')
         ->get();



        return view('/editar_cita', compact('tramites','citas','clientes','tipos','usuarios','funciones','conceptos'));
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
        $id = $request->input('fecha'); 
        
        $hoy = Now();

        $fechas = DB::table('citas')
        ->where('citas.id', '=', $id )
        ->select('citas.*')
        ->get();
        
          $fechcit;
        foreach($fechas as $fecha){
          $fechcit =  $fecha->fecha_hora;

        }

        
        if($fechcit > $hoy){
            Citas::where('id',$id)->first()->update($request->all()); 

            return redirect('/editar_cita')->with('status','Cita editada exitosamente');
        }
        else{
            return redirect('/editar_cita')->with('status2','La cita no se puede editar la fecha ya paso ');

        }

      
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
