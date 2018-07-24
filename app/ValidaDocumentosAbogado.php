<?php

namespace Notaria;  

use Illuminate\Database\Eloquent\Model;

class ValidaDocumentosAbogado extends Model
{
    protected $table = 'validacion_documentos_abogado'; 
    protected $fillable = ['cliente_id','estatus','tipo_tramite_id','documentacion_id','comentario'];
}
   