<?php

namespace Notaria;

use Illuminate\Database\Eloquent\Model;
use DB; 

class GuiaCliente extends Model
{
    //fucnion que devuelve la consulta a la tabla control tramites si el cliente_id coincide con el que se recibe
    public static function cliente($id){ 
        return DB::table('control_tramites')
        ->join('tipos_tramites', 'control_tramites.tramite_id', '=', 'tipos_tramites.id')
        ->join('clientes', 'control_tramites.cliente_id', '=', 'clientes.id')
         ->where('control_tramites.cliente_id', '=', $id) 
         ->select('control_tramites.*','tipos_tramites.tramite','clientes.nombre','clientes.apellido_paterno','clientes.apellido_materno')
         ->get();
         }
}
