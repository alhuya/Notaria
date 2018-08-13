<?php

namespace Notaria;

use Illuminate\Database\Eloquent\Model;

class Presupuesto extends Model
{
    protected $table = 'presupuestos'; 
    protected $fillable = ['cliente_id','costo_tramite_id','carpeta_id','estatus']; 
}

