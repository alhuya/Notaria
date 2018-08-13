<?php

namespace Notaria;

use Illuminate\Database\Eloquent\Model;
use DB;
class ElaboraPresupuesto extends Model
{ 
    public static function consulta($id,$tipo){ 

        $consultas = DB::table('control_tramites')
        ->where('control_tramites.carpeta_id', '=', $id)
       ->select('control_tramites.*')
        ->get(); 
     
        $tramite;
        foreach($consultas as $consulta){
    
            $tramite = $consulta->tramite_id;
            
        } 
     
        return  DB::table('conceptos_costos')
        ->where('conceptos_costos.costo_tramite_id', '=',$tipo)
        ->where('conceptos_costos.tramite_id', '=', $tramite)
       ->select('conceptos_costos.*')
        ->get(); 
    
    
    }
}
    