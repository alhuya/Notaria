<?php

namespace Notaria;

use Illuminate\Database\Eloquent\Model;

class TipoTarifa extends Model
{
    protected $table = 'tipo_tarifa'; 
    protected $fillable = ['tipo'];
}
 