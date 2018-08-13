<?php

namespace Notaria;

use Illuminate\Database\Eloquent\Model;
use DB;
 
class ElaboracionPresupuesto extends Model
{
    public static function cliente($id){  
        return DB::table('control_tramites')
    ->join('clientes', 'control_tramites.cliente_id', '=', 'clientes.id')
    ->join('tipos_tramites', 'control_tramites.tramite_id', '=', 'tipos_tramites.id')
    ->where('control_tramites.carpeta_id', '=', $id)
    ->select('control_tramites.*','clientes.nombre','clientes.apellido_paterno','clientes.apellido_materno','tipos_tramites.tramite')
    ->get();

    }  
}


 