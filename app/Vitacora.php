<?php
 
namespace Notaria;
use DB;
use Illuminate\Database\Eloquent\Model; 

class Vitacora extends Model
{
    protected $table = 'vitacora';
    protected $fillable = [ 'fecha','nombre','apellido_paterno','apellido_materno','telefono','celular','tipo'];

    //fucnion que devuelve los clientes registrados en vitacora segun las fechas de inicio y fin
    public static function consulta($fechain,$fechafin){ 
        return  DB::table('vitacora')
        -> where('vitacora.fecha', '>=',$fechain )
        -> where('vitacora.fecha', '<=', $fechafin)
        ->select('vitacora.*')
        ->get();

      

    } 

}
 