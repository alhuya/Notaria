<?php

namespace Notaria;

use Illuminate\Database\Eloquent\Model;
 
class TramitesAbogados extends Model
{
    protected $table = 'tramites_abogado';
    protected $fillable = ['tipo_tramite_id','usuario_id'];

}
  