<?php

namespace Notaria;
use DB;

use Illuminate\Database\Eloquent\Model;

class TramitesTerminados extends Model 
{
    protected $table = 'tramites_terminados';
    protected $fillable = ['carpeta_id','tramite_id','numero_escritura','cliente_id','fecha','volumen','folio1','folio2','otorgantes','contrato','puesto_id','dependencia_id','tramite_dependencia_id','revicion','kinegrama_id','terminado','fecha_entrega','nombre_recibe']; 

    public static function tramites($id){ 
        /*    return Clientes::where('id','=',$id)
            ->get();*/
            return  DB::table('tramites_terminados')
            ->where('tramites_terminados.numero_escritura', '=', $id)
            ->select( 'tramites_terminados.*')
            ->get();  
        }  

 

}
