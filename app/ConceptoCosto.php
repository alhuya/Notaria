<?php

namespace Notaria;
use DB;
 
use Illuminate\Database\Eloquent\Model;

class ConceptoCosto extends Model
{
    protected $table = 'conceptos_costos'; 
    protected $fillable = ['concepto','costo','costo_tramite_id','tramite_id'];

<<<<<<< HEAD


   /* public static function var($id, $tipo, $cliente){  
        return  DB::table('conceptos_costos')        
        ->where('tramite_id' ,'=' ,$id)
        ->where('costo_tramite_id','=',$tipo)
        ->where('cliente_id','=',$cliente)
=======
    public static function consulta($id,$tipo){  
        return  DB::table('conceptos_costos')        
        ->where('tramite_id' ,'=' ,$id)
        ->where('costo_tramite_id','=',$tipo)
>>>>>>> 0d877ba202b989b69ff7273c7baa556dcdfb438e
        ->select( 'conceptos_costos.*')
        ->get();
  
    }  

    */
    
}
     