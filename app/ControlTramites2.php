<?php

namespace Notaria;

use Illuminate\Database\Eloquent\Model;
use DB;

class ControlTramites2 extends Model
//funcion que devuelve la consulta a la tabla recepcion_pagos
{
    public static function cliente($id){  
   

  return  DB::table('recepcion_pagos')
    ->join('conceptos_costos', 'recepcion_pagos.concepto_id', '=', 'conceptos_costos.concepto_costo_id')
    ->Join('control_tramites', 'recepcion_pagos.carpeta_id', '=', 'control_tramites.carpeta_id')
    ->Join('tipos_tramites', 'control_tramites.tramite_id', '=', 'tipos_tramites.id')
   ->where('control_tramites.numero_escritura', '=',$id)       
   ->select('recepcion_pagos.*','tipos_tramites.tramite','tipos_tramites.id','conceptos_costos.costo')
    ->get();

    }
}
 