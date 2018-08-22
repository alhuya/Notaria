<?php

namespace Notaria;

use Illuminate\Database\Eloquent\Model;

class Municipios extends Model
{
    protected $table = 'municipios';
    //protected $fillable = ['id','municipio','estado_id'];

    //fucnion que devuelve los municipios segun el id del estao
    public static function Municipios($id){ 
        return municipios::where('estado_id','=',$id)
        ->get();
    }
}
  