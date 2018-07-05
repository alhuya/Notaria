<?php

namespace Notaria;

use Illuminate\Database\Eloquent\Model;

class Estados extends Model
{
      protected $table = 'estados';
    protected $fillable = ['id','estado'];

    public static function estados($id){
        return Estados::where('id','=',$id)
        ->get();
    }
}
