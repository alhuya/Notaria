<?php

namespace Notaria\Http\Controllers;

use Illuminate\Http\Request;
use Notaria\ControlTramites;
use Notaria\ControlTramites2;
use Notaria\Kinegramas;
use Notaria\TramitesTerminados;
use Illuminate\Support\Facades\Auth;
use DB;

class EntregaKinegramasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
      
        $Escrituras = ControlTramites::all(); 

      


        $puesto = Auth::user()->puesto_id;
               
       
       $conceptos = DB::table('menu_concepto')
        ->where('menu_concepto.puesto_id', '=', $puesto)
        ->select('menu_concepto.*')
        ->get();

        $funciones = DB::table('menu')
        ->where('menu.puesto_id', '=', $puesto) 
        ->select('menu.*')
        ->get();

        
        

         
        return view('entrega_kinegramas', compact('Escrituras','conceptos','funciones'));
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
        $cliente = Kinegramas::valor($id);
        return response()->json($cliente); 
      }
    }

     
    public function store2(Request $request)
    {
        $valor = $request->input('kinegrama');

        $consultas = DB::table('kinegramas')   
        ->where('kinegramas.kinegrama','=', $valor )     
        ->select('kinegramas.*')
        ->get(); 

       
      



        if ( $consultas->isEmpty()) {


        $kinegrama = new Kinegramas;  
        $kinegrama->kinegrama = $request->input('kinegrama');
        $kinegrama->cliente_id = $request->input('cliente');
        $kinegrama->save();  

        $escritura = $request->input('escritura'); 

       $numero_kinegramas = DB::table('kinegramas')
        -> orderBy('id', 'desc') 
        -> take(1) 
        ->select('kinegramas.*')
        ->get();
       
        $id;
        foreach($numero_kinegramas as $kinegrama){
            $id = $kinegrama->id;
        }
    

            $kinegrama = DB::table('control_tramites')
            ->where('numero_escritura', $escritura)
            ->update(['kinegrama_id' => $id]);

        
      
        return redirect('/entrega_kinegramas' )->with('status','Kinegrama agregado exitosamente');
    }
    else{
        return redirect('/entrega_kinegramas' )->with('status','Kinegrama ya existente');

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
        $id = $request->input('escritura');

         ControlTramites::where('numero_escritura',$id)->first()->update($request->all()); 


       

            return redirect('/entrega_kinegramas')->with('status2','Fecha Guardada Exitosamente'); 
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
 