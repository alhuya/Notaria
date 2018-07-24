<?php

namespace Notaria;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
   

   public static function dia($id){ 
         
        return DB::table('citas')
        ->where('citas.usuario_id','=', $id)
        ->select('citas.*')
        ->get(); 


        }  
}
