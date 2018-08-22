<?php

namespace Notaria;
use DB;

use Illuminate\Database\Eloquent\Model;

class TramitesTerminados extends Model 
{
    protected $table = 'tramites_terminados';
    protected $fillable = ['carpeta_id','tramite_id','numero_escritura','cliente_id','fecha','volumen','folio1','folio2','otorgantes','contrato','puesto_id','dependencia_id','tramite_dependencia_id','revicion','kinegrama_id','terminado','fecha_entrega','nombre_recibe']; 

    //fucnion que devuelve los tramites terminados
    public static function tramites($id){ 
     
           
                return DB::table('tramites_terminados')
                ->join('tipos_tramites', 'tramites_terminados.tramite_id', '=', 'tipos_tramites.id')
                ->join('clientes', 'tramites_terminados.cliente_id', '=', 'clientes.id')
                 ->where('tramites_terminados.numero_escritura', '=', $id) 
                 ->select('tramites_terminados.*','tipos_tramites.tramite','clientes.nombre','clientes.apellido_paterno','clientes.apellido_materno')
                 ->get();
                 
        }  

 

}
