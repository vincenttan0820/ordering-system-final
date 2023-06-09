<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        
    ];


    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('view-user-list', function ($user) {
            return !$user->hasPermissionTo('user-list');
        });
      
        /* define an admin */
        Gate::define('isAdmin', function($user){
            return $user->role_id =='1';
        });

        /* define a user */
        Gate::define('isUser', function($user){
            return $user->role_id =='2';
        });

        Gate::define('isStaff', function($user){
            return $user->role_id =='3';
        });
        
        //
    }
}
