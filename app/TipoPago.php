<?php

namespace Notaria;

use Illuminate\Database\Eloquent\Model;

class TipoPago extends Model
{
    
    protected $table = 'tipo_pago';
    protected $fillable = ['tipo'];
}
