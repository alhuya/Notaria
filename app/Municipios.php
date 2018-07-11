<?php

namespace Notaria;

use Illuminate\Database\Eloquent\Model;

class Municipios extends Model
{
    protected $table = 'municipios';
    //protected $fillable = ['id','municipio','estado_id'];

    public static function Municipios($id){ 
        return municipios::where('estado_id','=',$id)
        ->get();
    }
}
  