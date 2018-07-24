<?php

namespace Notaria; 

use Illuminate\Database\Eloquent\Model;
use DB;

class ControlTramites extends Model
{ 
    protected $table = 'control_tramites'; 
    protected $fillable = ['carpeta_id','tramite_id','numero_escritura','cliente_id','fecha','volumen','folio1','folio2','otorgantes','contrato','puesto_id','dependencia_id','tramite_dependencia_id','revicion','kinegrama_id','terminado','fecha_entrega'];

    public static function tramite($id){ 
        return DB::table('control_tramites')
    ->leftJoin('tipos_tramites', 'control_tramites.tramite_id', '=', 'tipos_tramites.id')
    ->where('control_tramites.cliente_id', '=', $id)
    ->select('control_tramites.*','tipos_tramites.tramite','tipos_tramites.id')
    ->get();

    }  

   /* public static function cliente($id){  
        return DB::table('control_tramites')
    ->leftJoin('tipos_tramites', 'control_tramites.tramite_id', '=', 'tipos_tramites.id')
    ->where('control_tramites.numero_escritura', '=', $id)
    ->select('control_tramites.*','tipos_tramites.tramite','tipos_tramites.id')
    ->get();

    }  */


}
     