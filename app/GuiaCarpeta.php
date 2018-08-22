<?php

namespace Notaria;
use DB;

use Illuminate\Database\Eloquent\Model;

class GuiaCarpeta extends Model
{
    //funcion que devuelve la consulta de la tabla control tramites
    public static function carpeta($id){ 
        return DB::table('control_tramites')
        ->join('tipos_tramites', 'control_tramites.tramite_id', '=', 'tipos_tramites.id')
        ->join('clientes', 'control_tramites.cliente_id', '=', 'clientes.id')
         ->where('control_tramites.carpeta_id', '=', $id) 
         ->select('control_tramites.*','tipos_tramites.tramite','clientes.nombre','clientes.apellido_paterno','clientes.apellido_materno')
         ->get();
         }
}
