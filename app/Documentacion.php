<?php
 
namespace Notaria;  
use DB;

use Illuminate\Database\Eloquent\Model;

class Documentacion extends Model 
{
     protected $table = 'Documentacion';
    protected $fillable = ['documento','costo','origen'];


    public static function doc($id){ 
       return DB::table('Documentacion')
        ->where('id','=', $id)
        ->select('Documentacion.*')
        ->get();
    }
} 
  