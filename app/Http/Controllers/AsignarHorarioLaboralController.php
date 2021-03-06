<?php

namespace Notaria\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Notaria\User;  
use Notaria\HorarioAbogado; 
use DB;

class AsignarHorarioLaboralController extends Controller
{  
    /** 
     * Display a listing of the resource.
     *
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
            $usuarios = DB::table('users')
            ->leftJoin('puestos', 'users.puesto_id', '=', 'puestos.id')
            -> where('puestos.abogado', '=', 'si')
            -> orderBy('id', 'desc')
            -> take(1)
            ->select('users.*', 'puestos.puesto','puestos.abogado')
            ->get();
           // dd($clientes);

           $puesto = Auth::user()->puesto_id;
               
       
           $conceptos = DB::table('menu_concepto')
            ->where('menu_concepto.puesto_id', '=', $puesto)
            ->select('menu_concepto.*')
            ->get();
    
            $funciones = DB::table('menu')
            ->where('menu.puesto_id', '=', $puesto)
            ->select('menu.*') 
            ->get();

        return view('/asignar_horario_laboral', compact('usuarios','conceptos','funciones')); 
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
        //Insert a la tabla HorarioAbogado
        $horario = new HorarioAbogado;
        $horario->tipo_horario = ('Horario Laboral');
        $horario->fecha_inicio = $request->input('fecha_i');   
        $horario->fecha_fin = $request->input('fecha_f'); 
        $horario->hora_inicio = $request->input('hora_i'); 
        $horario->hora_fin = $request->input('hora_f');   
        $horario->usuario_id = $request->input('nombre');  
        $horario->save();  
        return redirect('/horario_atencion_clientes'); 
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
