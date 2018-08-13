<?php  

namespace Notaria;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;

class User extends Authenticatable 
{
    use Notifiable;  

    /**
     * The attributes that are mass assignable.  
     *
     * @var array
     */
    // protected $table = 'users';
    protected $fillable = [
        'nombre','ap_paterno','ap_materno','puesto_id','estado','abogado', 'email', 'password'
    ];
 
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
 
 
    public static function usuarios($id){ 
        return DB::table('users')
    ->leftJoin('puestos', 'users.puesto_id', '=', 'puestos.id')
    -> where('users.id', '=', $id)
    ->select('users.*', 'puestos.puesto','puestos.abogado')
    ->get();

    } 

 

    
 
}
