<?php

namespace App\Providers;

use App\Models\User;
use App\Policies\UserPolicy;
use App\Utility\UserTypes;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        User::class => UserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        // act like a middleware to show and hide navs
        Gate::define("Admin",function(){
            if(auth()->user()->type == UserTypes::TYPE_ADMIN){
                return true;
            }
            return false; 
        });

        Gate::define("Salon",function(){
            if(auth()->user()->type == UserTypes::TYPE_SALON){
                return true;
            }
            return false; 
        });
      
        $this->registerPolicies();

        //
    }
}
