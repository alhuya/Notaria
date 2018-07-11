<?php

namespace Notaria;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    protected $table = 'clientes';
    protected $fillable = ['nombre','apellido_paterno','apellido_materno','telefono','celular','correo','calle','colonia','numero_interior','numero_exterior','codigo_postal','estado_id','municipio_id'];

    public static function clientes($id){ 
        return Clientes::where('id','=',$id)
        ->get();
    }
}
 