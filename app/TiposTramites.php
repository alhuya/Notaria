<?php

namespace Notaria;

use Illuminate\Database\Eloquent\Model;

class TiposTramites extends Model
{
    protected $table = 'tipos_tramites';
    protected $fillable = ['tramite','duracion'];
}
