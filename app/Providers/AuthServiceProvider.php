<?php

namespace Notaria\Providers; 
//agregue gatecontract
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'Notaria\Model' => 'Notaria\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {

        $this->registerPolicies($gate);

        $gate->define('isAdministrador' , function ($user){
            return $user-> puesto == 'Administrador';
        });

        $gate->define('isRecepcionista' , function($user){
            return $user-> puesto == 'Recepcionista';
        });

        $gate->define('isAbogado' , function($user){
            return $user-> puesto == 'Abogado';
        });

         $gate->define('isCaja' , function($user){
            return $user-> puesto == 'Caja';
        });

          $gate->define('isCalidad' , function($user){
            return $user-> puesto == 'Calidad';
        });

        
    }
}
