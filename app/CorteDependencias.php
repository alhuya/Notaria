<?php

namespace Notaria;

use Illuminate\Database\Eloquent\Model;

class CorteDependencias extends Model
{
    protected $table = 'corte_cp_dep';
      protected $fillable = ['fecha','total','comentario'];
}
