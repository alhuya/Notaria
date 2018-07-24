<?php

namespace Notaria;
use DB;

use Illuminate\Database\Eloquent\Model;
 
class Estados_Municipios extends Model
{
     protected $table = 'estados_municipios';
    protected $fillable = ['estados_id','municipio_id'];

    public static function estmun($id){ 
        
            return  DB::table('estados_municipios')
            ->join('municipios', 'estados_municipios.municipios_id', '=', 'municipios.id')
            ->join('estados', 'estados_municipios.estados_id', '=', 'estados.id')
            ->where('estados_municipios.estados_id', '=', $id)
            ->select( 'estados_municipios.*','municipios.municipio','estados.estado')
            ->get();  
        } 

}
 
