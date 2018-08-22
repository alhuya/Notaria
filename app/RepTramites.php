<?php

namespace Notaria; 
use DB;

use Illuminate\Database\Eloquent\Model;

class RepTramites extends Model
{
    //fucnion que relaciona un tramite con documentos
    public static function reportes($id){ 
        return DB::table('tramites_documento')
        ->Join('tipos_tramites', 'tramites_documento.tipo_tramite_id', '=', 'tipos_tramites.id')
        ->Join('documentacion', 'tramites_documento.documentacion_id', '=', 'documentacion.id')
        ->where('tramites_documento.tipo_tramite_id', '=', $id)
        ->select('tramites_documento.*','tipos_tramites.tramite','documentacion.documento')
        ->get();


    } 
}
 