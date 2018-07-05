<?php

namespace Notaria;

use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    protected $table = 'categorias_funciones';
    protected $fillable = ['categoria_funcion_id','nombre'];
}
