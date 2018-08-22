<?php

namespace Notaria;

use Illuminate\Database\Eloquent\Model;

class CosultaCita extends Model
{
    //funcion que devuelve la consulta a la tabla citas
    public static function cambios($fecha,$cliente){ 
         
        return DB::table('citas')
         ->Join('clientes', 'citas.cliente_id', '=', 'clientes.id')
         ->Join('tipos_tramites', 'citas.tipo_tramite', '=', 'tipos_tramites.id')
         ->Join('users', 'citas.usuario_id', '=', 'users.id')
         ->where('citas.cliente_id','=', 1)
        
         ->select('citas.*','tipos_tramites.tramite','clientes.nombre','clientes.apellido_paterno','clientes.apellido_materno','users.nombre','users.ap_paterno','users.ap_materno')
         ->get(); 
 
         dd($citas);
 

        }   
}
