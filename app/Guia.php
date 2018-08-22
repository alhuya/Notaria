<?php

namespace Notaria;

use Illuminate\Database\Eloquent\Model;
use DB;

class Guia extends Model
{

    //fucnion que devuelve la consulta de la tabla control_tramites
    public static function guia($id){ 
   return DB::table('control_tramites')
   ->join('tipos_tramites', 'control_tramites.tramite_id', '=', 'tipos_tramites.id')
   ->join('clientes', 'control_tramites.cliente_id', '=', 'clientes.id')
    ->where('control_tramites.numero_escritura', '=', $id) 
    ->select('control_tramites.*','tipos_tramites.tramite','clientes.nombre','clientes.apellido_paterno','clientes.apellido_materno')
    ->get();
    }
}
 