<?php

namespace Notaria;

use Illuminate\Database\Eloquent\Model;

class CorteImpuestos extends Model
{
    protected $table = 'corte_cp_im';// tabla corte_cp_im
      protected $fillable = ['fecha','total','comentario'];//campos de la tabla cortes_cp_im

} 
