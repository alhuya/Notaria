<?php
 
namespace Notaria; 

use Illuminate\Database\Eloquent\Model;

class Documentacion extends Model 
{
     protected $table = 'Documentacion';
    protected $fillable = ['documento','costo','origen'];


    public static function doc($id){ 
        return Documentacion::where('id','=',$id)
        ->get();
    }
}
 