<?php

namespace Notaria;

use Illuminate\Database\Eloquent\Model;
use DB;

class HorarioAbogado extends Model
{
    protected $table = 'horarios_abogado'; 
    protected $fillable = ['tipo_horario','fecha_inicio','fecha_fin','hora_inicio','hora_fin','usuario_id'];
//fucnion que devuelve la consulta a la tabla horario_abogad
    public static function horario($id){ 
     return DB::table('horarios_abogado')
    ->where('horarios_abogado.usuario_id', '=', $id)
    ->select('horarios_abogado.*')
    ->get();

    } 
}
