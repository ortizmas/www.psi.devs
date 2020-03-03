<?php

namespace App\Providers;

use App\User;
use App\Policies\UserPolicy;
use App\Inscription;
use App\Policies\InscriptionPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        //'App\Model' => 'App\Policies\ModelPolicy',
        //$this->registerPostPolicies();
        Inscription::class => InscriptionPolicy::class,
        User::class => UserPolicy::class,
        

    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        
        // Grant "Super Admin" users all permissions (assuming they are verified using can() and other gate-related functions):
        Gate::before(function ($user, $ability) {
            if ($user->hasRole('super-admin')) {
                return true;
            }
        });
    }
}
