<?php

namespace Notaria;
use DB;

use Illuminate\Database\Eloquent\Model;
 
// Muestra todos los datos de la tabla control tramites
class Carpetas extends Model
{
    public static function carpeta(){ 
        return DB::table('control_tramites')
        ->leftJoin('clientes', 'control_tramites.cliente_id', '=', 'clientes.id')
         ->select('control_tramites.*','clientes.nombre','clientes.apellido_paterno','apellido_materno')
         ->get(); 
         }
}

