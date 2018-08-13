<?php

namespace Notaria; 

use Illuminate\Database\Eloquent\Model;

class CostoTramite extends Model
{
    protected $table = 'costos_tramite';  
    protected $fillable = ['tipo_tramite_id','nombre'];

    public static function usuarios($id){ 
        return DB::table('users')
    ->leftJoin('puestos', 'users.puesto_id', '=', 'puestos.id')
    -> where('users.id', '=', $id)
    ->select('users.*', 'puestos.puesto','puestos.abogado')
    ->get();

    } 

} 
 