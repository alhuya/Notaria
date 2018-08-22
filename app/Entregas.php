<?php

namespace Notaria;

use Illuminate\Database\Eloquent\Model;
use DB;

class Entregas extends Model
{
    //fucnion que devuelve datos de la tabla control_tramites solo si se encuentra un kinegrama registrado
    public static function valor($id){ 

        $consultas =  DB::table('control_tramites')
        ->where('control_tramites.numero_escritura', '=', $id )
        ->select('control_tramites.*')
        ->get(); 

        $kinegrama;

        foreach($consultas as $consulta){
           $kinegrama = $consulta->kinegrama_id;
        }

        $consult =  DB::table('kinegramas')
        ->where('kinegramas.id', '=', $kinegrama )
        ->select('kinegramas.*')
        ->get(); 

        if ( $consultas->isEmpty()) {
       

        
        }
        else{

            return  DB::table('control_tramites')
            ->Join('clientes', 'control_tramites.cliente_id', '=', 'clientes.id')
            ->Join('tipos_tramites', 'control_tramites.tramite_id', '=', 'tipos_tramites.id')
            ->where('control_tramites.numero_escritura', '=', $id)        
            ->select( 'control_tramites.*','clientes.nombre','clientes.apellido_paterno','clientes.apellido_materno','tipos_tramites.tramite')
            ->get(); 
        }


        

        

    }
}
