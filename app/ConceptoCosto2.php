<?php

namespace Notaria;

use Illuminate\Database\Eloquent\Model;
use DB; 

class ConceptoCosto2 extends Model
{
      public static function consulta($id, $tipo){  
        return  DB::table('conceptos_costos')        
        ->where('tramite_id' ,'=' ,$id)
        ->where('costo_tramite_id','=',$tipo)
        ->select( 'conceptos_costos.*')
        ->get(); 
  
    } 
}
