<?php
 
namespace Notaria\Http\Controllers;
use Illuminate\Support\Facades\Auth;
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

        $clientes = Clientes::all();//se manda todo lo de la tabla clientes
        $tramites = TiposTramites::all();//todo de la tabla tipostramites
        $tipos = TipoCitas::all();//tiposcitas

        $puesto = Auth::user()->puesto_id;//se optiene el pueto_id del usuario logueados
               
       
        $conceptos = DB::table('menu_concepto')//se optienen las categorias del menu
         ->where('menu_concepto.puesto_id', '=', $puesto)
         ->select('menu_concepto.*')
         ->get();
 
         $funciones = DB::table('menu')//se optienen las fucniones del menu
         ->where('menu.puesto_id', '=', $puesto)
         ->select('menu.*')
         ->get();
        return view('alta_cita', compact('clientes','tramites','tipos','usuarios','conceptos','funciones'));
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
        $fecha = $request->input('fecha'); 
        $abogado = $request->input('abogado');
        $hoy = Now(); //fecha y hora del dia de hoy 2018-08-21 00:00:00
        $dia=date("w", strtotime($fecha));//Se optiene solo la fecha

        $abogados = DB::table('horarios_abogado')  
        ->where('horarios_abogado.usuario_id','=', $abogado)  //se consulta el horario del abogado
        ->where('horarios_abogado.tipo_horario','=','Horario Atencion Clientes')     
        ->select('horarios_abogado.*')
        ->get(); 
        
        $dato = $fecha;
        $fecha_abogado = date('Y-m-d',strtotime($dato));
        $hora = date('H:i:s',strtotime($dato));  


        $consulta = DB::table('citas')
        ->where('citas.fecha_hora','=', $fecha)    
        ->where('citas.usuario_id','=', $abogado)     
        ->select('citas.*')
        ->get(); 

        if ($consulta->isEmpty()) {
                   
            if($fecha > $hoy){
                if( $dia != 0){
                    foreach($abogados as $abogado ){
                    if($hora > $abogado->hora_inicio and $hora < $abogado->hora_fin  ){
               
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
                    else{
             return redirect('/alta_cita')->with('status','Cita no registrada, hora incorrecta');
                    }
                    }
                }
                else{
                    return redirect('/alta_cita')->with('status2','Cita no registrada,dia inhabil ');
                }
        }
        else{
            return redirect('/alta_cita')->with('status2','Cita no registrada, La fecha ya pasó ');
        }

        }
        else{
            return redirect('/alta_cita')->with('status2','Cita ya registrada ');

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
