<?php

namespace Notaria; 

use Illuminate\Database\Eloquent\Model;
use DB;
class PresupuestoConsulta extends Model
{ 
    public static function var($numero){ 

        $c=  DB::table('recepcion_pagos')
    ->leftJoin('conceptos_costos', 'recepcion_pagos.concepto_id', '=', 'conceptos_costos.concepto_costo_id')
    ->where('recepcion_pagos.carpeta_id', '=',$numero)


   
   ->select('recepcion_pagos.*','conceptos_costos.costo','conceptos_costos.concepto')
    ->get();

       
        if ($c->isEmpty()) {

         $consultas = DB::table('control_tramites')
        ->where('control_tramites.carpeta_id', '=',$numero)
        ->select('control_tramites.*')
        ->get();

        $tramite; 
        foreach($consultas as $consulta){
            $tramite = $consulta->tramite_id;
        }

        $consultas2 = DB::table('presupuestos')
        ->where('presupuestos.carpeta_id', '=',$numero)
        ->select('presupuestos.*')
        ->get();

          $costo_tramite_id;
        foreach($consultas2 as $consult){

            $costo_tramite_id = $consult->costo_tramite_id;
        }



        return DB::table('conceptos_costos')
        ->where('conceptos_costos.costo_tramite_id', '=',$costo_tramite_id)
        ->where('conceptos_costos.tramite_id', '=',$tramite)
        ->select('conceptos_costos.*')
        ->get();
    }
    else{

        return  DB::table('recepcion_pagos')
        ->leftJoin('conceptos_costos', 'recepcion_pagos.concepto_id', '=', 'conceptos_costos.concepto_costo_id')
        ->where('recepcion_pagos.carpeta_id', '=',$numero)
       
       ->select('recepcion_pagos.*','conceptos_costos.costo','conceptos_costos.concepto','conceptos_costos.concepto_costo_id')
        ->get();
    }




  /*  return  DB::table('recepcion_pagos')
    ->leftJoin('conceptos_costos', 'recepcion_pagos.concepto_id', '=', 'conceptos_costos.concepto_costo_id')
    ->where('recepcion_pagos.carpeta_id', '=',$numero)
   
   ->select('recepcion_pagos.*','conceptos_costos.costo','conceptos_costos.concepto')
    ->get();
*/
}
} 