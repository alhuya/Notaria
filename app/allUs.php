<?php

namespace Notaria;

use Illuminate\Database\Eloquent\Model;
use DB;
// Consulta a la tabla usuarios , Se muestran todos los usuarios 
//leftjoin se usa para unir una tabla con otras tablas
class allUs extends Model
{
    public static function todos(){ 
        
        return DB::table('users')
    ->leftJoin('puestos', 'users.puesto_id', '=', 'puestos.id')
    ->select('users.*', 'puestos.puesto','puestos.abogado')
    ->get();

    } 
} 
