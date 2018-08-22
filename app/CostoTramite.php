<?php

namespace Notaria; 

use Illuminate\Database\Eloquent\Model;

class CostoTramite extends Model
{
    protected $table = 'costos_tramite';  //tabla
    protected $fillable = ['tipo_tramite_id','nombre'];//campos de la tabla costo_tramite_id


//funcion que devuelve la consulta a la tabla user
    public static function usuarios($id){ 
        return DB::table('users')
    ->leftJoin('puestos', 'users.puesto_id', '=', 'puestos.id')
    -> where('users.id', '=', $id)
    ->select('users.*', 'puestos.puesto','puestos.abogado')
    ->get();

    } 

} 
 