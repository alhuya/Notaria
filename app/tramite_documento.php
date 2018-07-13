<?php

namespace Notaria;

use Illuminate\Database\Eloquent\Model;

class tramite_documento extends Model
{
    protected $table = 'tramites_documento';
    protected $fillable = ['tipo_tramite_id','documentacion_id'];

}
  