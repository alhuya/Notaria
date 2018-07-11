<?php

namespace Notaria;

use Illuminate\Database\Eloquent\Model;
 
class Estados_Municipios extends Model
{
     protected $table = 'estados_municipios';
    protected $fillable = ['estados_id','municipio_id'];

    public function estados()//estados_id
    {
   
       return $this->belongsTo(Estados::class);
   }
   public function municipios()//municipios_id 
    {
   
       return $this->belongsTo(Municipios::class);
   }
}
 
