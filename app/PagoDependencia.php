<?php

namespace Notaria;

use Illuminate\Database\Eloquent\Model;

class PagoDependencia extends Model
{
    protected $table = 'pagos_dependencias'; 
    protected $fillable = ['fecha','dependencia','pago','tipo_pago','cuenta','entrega'];
}
 