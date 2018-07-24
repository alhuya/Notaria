<?php

namespace Notaria;

use Illuminate\Database\Eloquent\Model;

class ValidarDocumentos extends Model
{
    protected $table = 'validacion_documentos'; 
    protected $fillable = ['cliente_id','estatus','tipo_tramite_id','documentacion_id'];

   
} 
