<?php

namespace Notaria; 

use Illuminate\Database\Eloquent\Model;
use DB;

class UsActivos extends Model
{ 
    //fucnion que devuelve los usuarios activos
    public static function activos(){ 

        return DB::table('users')
    ->leftJoin('puestos', 'users.puesto_id', '=', 'puestos.id')
    -> where('users.estado', '=', 'Activo')
    ->select('users.*', 'puestos.puesto','puestos.abogado')
    ->get();

    } 
} 
