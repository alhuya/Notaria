<?php

namespace Notaria;

use Illuminate\Database\Eloquent\Model;

class tramite_documento extends Model
{
    protected $table = 'tramites_documento';
    protected $fillable = ['tipo_tramite_id','documentacion_id'];

    public static function consult($id){ 
        return tramite_documento::where('tipo_tramite_id','=',$id)
        ->get();
    } 

}
  