<?php

namespace App\Providers;

use App\Role;
use App\User;
use App\Policies\UserPolicy;
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

    public function registerPostPolicies()
    {
        Gate::define('create-post', function ($user) {
            return $user->hasAccess(['create-post']);
        });
        Gate::define('update-post', function ($user, Post $post) {
            return $user->hasAccess(['update-post']) or $user->id == $post->user_id;
        });
        Gate::define('publish-post', function ($user) {
            return $user->hasAccess(['publish-post']);
        });
        Gate::define('see-all-drafts', function ($user) {
            return $user->inRole('editor');
        });
    }
}
