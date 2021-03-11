<?php

namespace App\Providers;

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
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        
        Gate::define('manage-users', function($user) {
            return $user->roles == "Super Admin";
        });
        Gate::define('manage-administration', function($user) {
            return $user->roles == "Super Admin" || $user->roles == "Admin";
        });
        Gate::define('manage-student', function($user) {
            return $user->roles == "Super Admin" || $user->roles == "Admin";            
        });        
        Gate::define('display-nilai', function($user) {
            return $user->roles == "Student";            
        });        
    }
}
