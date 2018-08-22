<?php

namespace Notaria;

use Illuminate\Database\Eloquent\Model;
use DB;

class TramTermClient extends Model
{
    //fucnion que devulve los tramites terminados segun el cliente_id
    public static function client($id){ 
      
            return DB::table('tramites_terminados')
            ->join('tipos_tramites', 'tramites_terminados.tramite_id', '=', 'tipos_tramites.id')
            ->join('clientes', 'tramites_terminados.cliente_id', '=', 'clientes.id')
             ->where('tramites_terminados.cliente_id', '=', $id) 
             ->select('tramites_terminados.*','tipos_tramites.tramite','clientes.nombre','clientes.apellido_paterno','clientes.apellido_materno')
             ->get();
          
           
        }  
       
}
 