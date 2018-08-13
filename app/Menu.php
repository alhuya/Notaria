<?php

namespace Notaria;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    
    protected $table = 'menu';
    protected $fillable = ['puesto_id','categoria_funcion_id','funcion_id'];  
}
 