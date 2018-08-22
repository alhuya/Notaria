<?php

namespace Notaria;

use Illuminate\Database\Eloquent\Model;

class Dependencias extends Model
{
    protected $table = 'dependencias'; //tabla dependencias
    protected $fillable = ['dependencia']; //campos
}
