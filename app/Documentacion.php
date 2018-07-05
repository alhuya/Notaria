<?php
 
namespace Notaria; 

use Illuminate\Database\Eloquent\Model;

class Documentacion extends Model
{
     protected $table = 'Documentacion';
    protected $fillable = ['documento','costo','origen'];
}
