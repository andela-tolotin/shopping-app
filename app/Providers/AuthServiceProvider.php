<?php

namespace App\Providers;

use App\User;
use Illuminate\Support\Facades\Gate;
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
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {
        parent::registerPolicies($gate);

        // Admin can see any menu which this is apply
        $gate->define('ADMIN', function ($user) {
            return $user->role_id === 3;
        });

        // Buyer cannot see any menu where this is apply but only Admin and MANAGER can see such menu
        $gate->define('ADMIN_MANAGER', function ($user) {
            return $user->role_id !== 1;
        });

        //Only Buyer can see the menu
        $gate->define('BUYER', function ($user) {
            return $user->role_id === 1;
        });
    }
}
