<?php

namespace Notaria;

use Illuminate\Database\Eloquent\Model;

class PagoImpuesto extends Model
{
    protected $table = 'pago_impuestos'; 
    protected $fillable = ['fecha','impuesto','	cantidad','tipo_pago','cuenta','entrega'];
}
  