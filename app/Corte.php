<?php

namespace Notaria;

use Illuminate\Database\Eloquent\Model;

class Corte extends Model
{
    protected $table = 'cortes'; 
    protected $fillable = ['cliente_id','presupuesto_id','fecha','tipo_pago','ingreso_trasferencia','total','vale','comentario'];
}

