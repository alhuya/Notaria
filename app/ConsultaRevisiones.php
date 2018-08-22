<?php

namespace Notaria;
use DB;
use Illuminate\Database\Eloquent\Model;

class ConsultaRevisiones extends Model
{
    //funcion que devuelve la consulta a la tabla control tramites
    public static function rev($id){  

        return DB::table('control_tramites')
        ->join('tipos_tramites', 'control_tramites.tramite_id', '=', 'tipos_tramites.id')
        ->join('revisiones', 'control_tramites.revision', '=', 'revisiones.revision_id')
        ->join('tramites_documento', 'control_tramites.tramite_id', '=', 'tramites_documento.tipo_tramite_id')
        ->join('documentacion', 'documentacion.id', '=', 'tramites_documento.documentacion_id')
        ->where('control_tramites.carpeta_id', '=', $id) 
        ->select('control_tramites.*','tipos_tramites.tramite','revisiones.comentario','documentacion.documento','revisiones.comentario_cal','revisiones.estatus1','revisiones.estatus2')
        ->get();

    }  
}
