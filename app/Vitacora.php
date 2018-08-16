<?php
 
namespace Notaria;

use Illuminate\Database\Eloquent\Model; 

class Vitacora extends Model
{
    protected $table = 'vitacora';
    protected $fillable = [ 'fecha','nombre','apellido_paterno','apellido_materno','telefono','celular','tipo'];
}
 