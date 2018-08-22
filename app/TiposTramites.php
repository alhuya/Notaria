<?php
 
namespace Notaria;

use Illuminate\Database\Eloquent\Model; 

class TiposTramites extends Model
{
    protected $table = 'tipos_tramites'; 
    protected $fillable = ['id','tramite','duracion'];

    //fucnion que devulve un tramite segun el id
    public static function tramite($id){  
        return TiposTramites::where('id','=',$id)
        ->get();
    }
}   
  