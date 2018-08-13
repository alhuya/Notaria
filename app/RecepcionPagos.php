<?php

namespace Notaria;

use Illuminate\Database\Eloquent\Model;

class RecepcionPagos extends Model
{
    protected $table = 'recepcion_pagos';
    protected $fillable = ['cliente_id','carpeta_id','presupuesto_id','cantidad','tipo_pago','fecha_hora','deposito_cuenta'];
}  
 