<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;

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
        //let's create a gate called "manage-stuff" which we'll use elsewhere to determine who can do all types of admin stuff
        //like manage users, manage feeds
        //the reason i put all admin stuff in one gate is ONLY because i have put admin routes (both feed and user management)
            //into one grouped route
        Gate::define('manage-stuff', function($user){
            return $user->hasAnyRoles(['super-admin', 'admin']);
        });

        $this->registerPolicies();

        //
    }
}
