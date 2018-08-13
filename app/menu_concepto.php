<?php

namespace Notaria;

use Illuminate\Database\Eloquent\Model;

class menu_concepto extends Model
{
    protected $table = 'menu_concepto';
    protected $fillable = ['puesto_id','categoria_funcion_id']; 
}
  