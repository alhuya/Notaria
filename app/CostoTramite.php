<?php

namespace Notaria; 

use Illuminate\Database\Eloquent\Model;

class CostoTramite extends Model
{
    protected $table = 'costos_tramite'; 
    protected $fillable = ['tipo_tramite_id','nombre'];

}
