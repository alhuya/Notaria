<?php  

namespace Notaria;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
        'nombre','ap_paterno','ap_materno','puesto','abogado', 'email', 'password'
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
        return User::where('id','=',$id)
        ->get();
    }
}
