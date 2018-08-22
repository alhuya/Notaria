<?php

namespace Notaria;
use DB;

use Illuminate\Database\Eloquent\Model;

class ProyectoDependencia extends Model
{

    protected $table = 'proyecto_dependencia'; 
    protected $fillable = ['fecha_ingreso','numero_folio','dependencia','fecha_egreso'];

    //fucion que devuelve el contenido de la tabla proyecto_dependencia
    public static function proydep($id){ 
        return DB::table('proyecto_dependencia') 
          ->where('proyecto_dependencia.numero_folio', '=', $id)
          ->select('proyecto_dependencia.*')
          ->get();
       
          } 
 

}
 