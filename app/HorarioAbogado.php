<?php

namespace Notaria;

use Illuminate\Database\Eloquent\Model;

class HorarioAbogado extends Model
{
    protected $table = 'horarios_abogado'; 
    protected $fillable = ['tipo_horario','fecha_inicio','fecha_fin','hora_inicio','hora_fin','usuario_id'];
}
