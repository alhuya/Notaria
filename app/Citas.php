<?php

namespace Notaria;
use DB;
use Illuminate\Database\Eloquent\Model; 

class Citas extends Model
{
    protected $table = 'citas'; 
    protected $fillable = ['cliente_id','fecha_hora','tipo_tramite','usuario_id','tipo_cita_id','confirmacion_tramite'];

      public static function dia($id){ 
         
        return DB::table('citas')
        ->where('citas.usuario_id','=', $id)
        ->select('citas.*')
        ->get(); 


        }   

} 
   