<?php
 
namespace Notaria;

use Illuminate\Database\Eloquent\Model;
use DB;

class TramTermCarpet extends Model
{
    //funcion que devuelve los tramites terminados dependendo del numero de la carpeta
    public static function carpet($id){ 
                 

                 return DB::table('tramites_terminados')
                 ->join('tipos_tramites', 'tramites_terminados.tramite_id', '=', 'tipos_tramites.id')
                 ->join('clientes', 'tramites_terminados.cliente_id', '=', 'clientes.id')
                  ->where('tramites_terminados.carpeta_Id', '=', $id) 
                  ->select('tramites_terminados.*','tipos_tramites.tramite','clientes.nombre','clientes.apellido_paterno','clientes.apellido_materno')
                  ->get();
                  
                 
        }  
} 
