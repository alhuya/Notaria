<?php

namespace Notaria;

use Illuminate\Database\Eloquent\Model;

class ConsultaPresupuesto extends Model
{
    // funcion que devuelve la conaulta a la tabla control tramites , se une a la tabla concepto_costo,clientes y tipos de tramites
    public static function consulta($numero){

        return DB::table('control_tramites')
    ->join('conceptos_costos', 'control_tramites.tramite_id', '=', 'conceptos_costos.tramite_id')
    ->join('clientes', 'control_tramites.cliente_id', '=', 'clientes.id')
    ->join('tipos_tramites', 'control_tramites.tramite_id', '=', 'tipos_tramites.id')
    ->where('control_tramites.carpeta_id', '=', $id)
    ->where('conceptos_costos.costo_tramite_id', '=', $tipo)  
   
   ->select('conceptos_costos.*','clientes.nombre','clientes.apellido_paterno','clientes.apellido_materno','tipos_tramites.tramite')
    ->get(); 

}
}
