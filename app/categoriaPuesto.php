<?php

namespace Notaria;

use Illuminate\Database\Eloquent\Model;

class categoriaPuesto extends Model
{
      protected $table = 'categorias_puestos';
      protected $fillable = ['puesto_id','categoria_funcion_id'];
}
 