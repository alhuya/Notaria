<?php

namespace Notaria;

use Illuminate\Database\Eloquent\Model;
use DB;

class CarpetasTerm extends Model
{
    // Consulta la tabla tramites terminados y se relaciona con los clientes
    public static function carpeta(){ 
        return DB::table('tramites_terminados')
        ->leftJoin('clientes', 'tramites_terminados.cliente_id', '=', 'clientes.id')
         ->select('tramites_terminados.*','clientes.nombre','clientes.apellido_paterno','apellido_materno')
         ->get(); 
         }
}
