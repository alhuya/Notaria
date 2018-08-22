<?php

namespace Notaria;
use DB;
use Illuminate\Database\Eloquent\Model; 

class Citas extends Model
{
    protected $table = 'citas'; 
    protected $fillable = ['cliente_id','fecha_hora','tipo_tramite','usuario_id','tipo_cita_id','confirmacion_tramite'];//Campos de la tabla citas

      public static function dia($id){ 
         // Consulta a la tabla citas, relacionada con las tablas tipos_tramites y tipos citas
        return DB::table('citas')
        ->Join('clientes', 'citas.cliente_id', '=', 'clientes.id')
        ->Join('tipos_tramites', 'citas.tipo_tramite', '=', 'tipos_tramites.id')
        ->Join('tipo_citas', 'citas.tipo_cita_id', '=', 'tipo_citas.id')
        ->where('citas.usuario_id','=', $id)
        ->select('citas.*','clientes.nombre','clientes.apellido_paterno','clientes.apellido_materno','tipos_tramites.tramite','tipo_citas.tipo')
        ->get(); 


        }   

} 
   