<?php
 
namespace Notaria;

use Illuminate\Database\Eloquent\Model;
use DB;

class Menu extends Model
{
    
    protected $table = 'menu';
    protected $fillable = ['puesto_id','categoria_funcion_id','funcion_id'];  

    public static function categorias($id){ 

     

       $usuarios= DB::table('users')
        -> where('users.id', '=', $id)
        ->select('users.*')
        ->get();
 
        $puesto;

        foreach($usuarios as $usuario){
            $puesto = $usuario->puesto_id;
        }

        return DB::table('menu')
    ->Join('categorias_funciones', 'menu.categoria_funcion_id', '=', 'categorias_funciones.id')
    ->Join('funciones', 'menu.funcion_id', '=', 'funciones.funcion_id')
    ->Join('users', 'menu.puesto_id', '=', 'users.puesto_id')
    ->where('menu.puesto_id', '=', $puesto)
    ->select('menu.*', 'categorias_funciones.nombre','funciones.nombre_funcion','users.id')
    ->get();

    } 
}
 