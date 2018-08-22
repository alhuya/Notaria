<?php

namespace Notaria;

use Illuminate\Database\Eloquent\Model;
use DB;

class Agenda extends Model
{
// Consulta a la tabla citas
   public static function dia($id){ 
         
        return DB::table('citas')
        ->where('citas.usuario_id','=', $id)
        ->select('citas.*')
        ->get(); 
        }  
}
