<?php

namespace Notaria;
use DB;

use Illuminate\Database\Eloquent\Model;

class ConceptoCosto extends Model
{
    protected $table = 'conceptos_costos'; 
    protected $fillable = ['concepto','costo','costo_tramite_id','tramite_id'];

    public static function consulta($id, $tipo){  
        return  DB::table('conceptos_costos')
        ->where('costo_tramite_id' ,'=' ,$tipo)
        ->where('tramite_id' ,'=' ,$id)
        ->select( 'conceptos_costos.*')
        ->get();
  
    } 
}
    