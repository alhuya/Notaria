<?php

namespace Notaria;
 
use Illuminate\Database\Eloquent\Model; 
use DB;

class UsInactivos extends Model
{
    //fucnion que devulve los usuarios inactivos
    public static function inactivo(){ 

        return DB::table('users')
    ->leftJoin('puestos', 'users.puesto_id', '=', 'puestos.id')
    -> where('users.estado', '=', 'Inactivo')
    ->select('users.*', 'puestos.puesto','puestos.abogado')
    ->get();

    } 
}
