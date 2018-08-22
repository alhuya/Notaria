<?php

namespace Notaria; 

use Illuminate\Database\Eloquent\Model;
use DB; 
 
class ControlTramites extends Model
{ 
    protected $table = 'control_tramites'; //tabla control tramites
    protected $fillable = ['carpeta_id','tramite_id','numero_escritura','cliente_id','fecha','volumen','folio1','folio2','otorgantes','contrato','puesto_id','dependencia_id','tramite_dependencia_id','revicion','kinegrama_id','terminado','fecha_entrega','nombre_recibe'];



  
// fucnion que devuelve la consulta a la tabla control tramites
    public static function tramite($id){  
        return DB::table('control_tramites')
    ->join('tipos_tramites', 'control_tramites.tramite_id', '=', 'tipos_tramites.id')
    ->join('revisiones', 'control_tramites.revision', '=', 'revisiones.revision_id')
    ->join('tramites_documento', 'control_tramites.tramite_id', '=', 'tramites_documento.tipo_tramite_id')
    ->join('documentacion', 'documentacion.id', '=', 'tramites_documento.documentacion_id')
    ->where('control_tramites.carpeta_id', '=', $id) 
    ->select('control_tramites.*','tipos_tramites.tramite','revisiones.comentario','documentacion.documento')
    ->get();

    }  

 

 



}
     