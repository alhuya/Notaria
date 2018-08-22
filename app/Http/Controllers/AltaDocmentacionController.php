<?php
 
namespace Notaria\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use DB;

use Illuminate\Http\Request;
use Notaria\Documentacion; 
use Notaria\Dependencias;

class AltaDocmentacionController extends Controller
{
    /**
     * Display a listing of the resource.  
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $puesto = Auth::user()->puesto_id;//se optiene el puesto_id del usuario que esta logueado
        $Dependencias = dependencias::all();
               
       
        $conceptos = DB::table('menu_concepto')
         ->where('menu_concepto.puesto_id', '=', $puesto)//se optiene las categorias del menu
         ->select('menu_concepto.*')
         ->get();
 
         $funciones = DB::table('menu')
         ->where('menu.puesto_id', '=', $puesto)//se optienen las fucniones del menu
         ->select('menu.*')
         ->get();

          return view('alta_documentacion',compact('conceptos','funciones','Dependencias'));
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
    //Validaciones de los inputs
        $request->validate([
            'documento' => 'required|string|max:255',
            'costo' => 'required|numeric|max:255',
            'origen' => 'required|string|max:255',

        ]);
 
//Insert en la tabla Documentacion
        $documentacion = new Documentacion;
        $documentacion->documento = $request->input('documento');
        $documentacion->costo = $request->input('costo');
        $documentacion->origen= $request->input('origen');
        $documentacion->save();
        return redirect('/alta_documentacion')->with('status','Documento guardado exitosamente');
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
