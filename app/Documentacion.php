<?php
 
namespace Notaria;  
use DB;

use Illuminate\Database\Eloquent\Model;

class Documentacion extends Model 
{
     protected $table = 'Documentacion';//tabla
    protected $fillable = ['documento','costo','origen'];//campos de la tabla documentacion

//funcion que devuelve la consulta a la tabla documentacion
    public static function doc($id){ 
       return DB::table('Documentacion')
        ->where('id','=', $id)
        ->select('Documentacion.*')
        ->get();
    }
} 
  