<?php

namespace Notaria;

use Illuminate\Database\Eloquent\Model;

class TipoCitas extends Model
{ 
    protected $table = 'tipo_citas';
    protected $fillable = ['id','tipo','duracion'];

    //fucnion que devuelve un tipo de cita
    public static function tipos2($id){ 
        return TipoCitas::where('id','=',$id)
        ->get();
    }
}
 