<?php
namespace Notaria\Http\Controllers;
 
use Illuminate\Http\Request;
use Notaria\puestos;
use Notaria\Categorias;
use Notaria\categoriaPuesto;
class PuestosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index()
    {
        $categorias = Categorias::all();
        return view('puestos', compact('categorias'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(array $data)
    {
    }
     protected function validator(Request $request)
    {
        return Validator::make($request, [
            'nombre' => 'required|string|max:255',
            
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $puestos = new puestos;
        $puestos->nombre = $request->input('puesto');
        $puestos->abogado = $request->input('abogado');
        
        $nom = $puestos->nombre;
        $puestos->save();
       
        $idPuesto =  $puestos->select('id','nombre')->where('nombre', '=', $nom)->get();
       
        $puestoID;
        foreach ($idPuesto as $idp) {
             $puestoID = $idp->id;             
        }
        //echo $puestoID;
        $categoriasId = $request->input('catId');
        $catID;
        foreach ($categoriasId as $categoriaId) {
            $catID=  $categoriaId;   
            $catPuesto = new categoriaPuesto;
            $catPuesto->puesto_id = $puestoID;
            $catPuesto->categoria_funcion_id = $catID;   
            $catPuesto->save();       
        }    

        return redirect('/puestos')->with('status','Puesto guardado exitosamente');

        


    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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