<?php
 
namespace Notaria\Http\Controllers;

use Illuminate\Http\Request;
use Notaria\Clientes;
use Notaria\TiposTramites;
use Notaria\TipoCitas;
use Notaria\Citas;

use DB;

class AltaCitaController extends Controller
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

        $clientes = Clientes::all();
        $tramites = TiposTramites::all();
        $tipos = TipoCitas::all();
        return view('alta_cita', compact('clientes','tramites','tipos','usuarios'));
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
        $citas = new Citas ;
        $citas->cliente_id = $request->input('nombre');
        $citas->fecha_hora = $request->input('fecha');
        $citas->tipo_tramite = $request->input('tramite');
        $citas->usuario_id = $request->input('abogado');
        $citas->tipo_cita_id = $request->input('tipo');
        $citas->confirmacion_tramite=('No');
        $citas->save();
        return redirect('/alta_cita')->with('status','Cita guardada exitosamente');
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
