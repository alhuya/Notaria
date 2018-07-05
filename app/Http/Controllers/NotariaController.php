<?php

namespace Notaria\Http\Controllers;

use Illuminate\Http\Request;
use App\cliente;
use Notaria\puestos;

class NotariaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        
        return view('usuarios');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
  
    
     
   

    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request->all());
       // return 'Store';

        
        $cliente = new cliente ;
            $cliente->nombre = $request->input('nombre');
            $cliente->apellido = $request->input('apellido');
            $cliente->domicilio = $request->input('domicilio');
            $cliente->telefono = $request->input('telefono');
            $cliente->celular = $request->input('celular');
            $ciente->tramite = $request->input('tramite');
       
        $cliente ->save();
        return 'Completado';
      //  return redirect('/home')->with('El cliente a sido guardado exitosamente');
        
    
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



     protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',

        ]);
    }


      public function select(){ $data=DB::table('roles')
       ->select('name')
       ->get();
        return view('pruebas.select')->with('data',$data);
    }
 
    public function postSelect(Request $request){
        dd($request->all());
    }
}
