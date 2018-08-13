<?php

namespace Notaria;

use Illuminate\Database\Eloquent\Model;

class Funciones extends Model
{
    protected $table = 'funciones';
    protected $fillable = ['nombre','categoria_funcion_id'];

}
 