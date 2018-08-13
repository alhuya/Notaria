<?php

namespace Notaria;

use Illuminate\Database\Eloquent\Model;
use DB;

class ControlTramitesFolio extends Model
{
    public static function tramite($cliente,$carpeta){ 
        return DB::table('control_tramites') 
    ->leftJoin('tipos_tramites', 'control_tramites.tramite_id', '=', 'tipos_tramites.id')
    ->where('control_tramites.cliente_id', '=', $cliente)
    ->where('control_tramites.carpeta_id', '=', $carpeta)
    ->select('control_tramites.*','tipos_tramites.tramite','tipos_tramites.id')
    ->get();

    }  
}
  