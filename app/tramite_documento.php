<?php

namespace Notaria;
use DB;

use Illuminate\Database\Eloquent\Model;

class tramite_documento extends Model
{
    protected $table = 'tramites_documento';
    protected $fillable = ['tipo_tramite_id','documentacion_id'];

    public static function consult($id){ 
       /* return tramite_documento::where('id','=',$id)
        ->get();
        */
        return    DB::table('tramites_documento')
        ->join('tipos_tramites', 'tramites_documento.tipo_tramite_id', '=', 'tipos_tramites.id')
        ->join('documentacion', 'tramites_documento.documentacion_id', '=', 'documentacion.id')
        ->where('tramites_documento.tipo_tramite_id', '=', $id)
        ->select( 'tramites_documento.*','tipos_tramites.tramite','tipos_tramites.duracion','documentacion.documento','documentacion.costo')
        ->get();
    } 

}
  