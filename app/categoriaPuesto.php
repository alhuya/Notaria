<?php

namespace Notaria;
use DB;

use Illuminate\Database\Eloquent\Model;

class categoriaPuesto extends Model
{

      protected $table = 'categorias_puestos';
      protected $fillable = ['puesto_id','categoria_funcion_id'];//campos de la tabla categoria puesto

      public static function categoria($id){ 
        // Se optienen los datos de la tabla categira puesto y se relaciona con la tabla categoria funciones
      return DB::table('categorias_puestos') 
      ->leftJoin('categorias_funciones', 'categorias_puestos.categoria_funcion_id', '=', 'categorias_funciones.id')
        ->where('categorias_puestos.puesto_id', '=', $id)
        ->select('categorias_puestos.*','categorias_funciones.nombre','categorias_funciones.id')
        ->get();
     
        } 
 
}

     