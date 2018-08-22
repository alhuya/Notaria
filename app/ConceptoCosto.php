<?php

namespace Notaria;
use DB;
 
use Illuminate\Database\Eloquent\Model;

class ConceptoCosto extends Model
{
    protected $table = 'conceptos_costos'; //tabla concepto costo
    protected $fillable = ['concepto','costo','costo_tramite_id','tramite_id'];



  
    
}
     