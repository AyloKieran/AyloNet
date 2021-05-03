<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
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

        Gate::define('admin', function (User $user) {
            if ($user->user_role == 'admin')
            {
                return true;
            }
            
            if ($user->provider == 'google' || $user->provider == 'azure')
            {
                if (preg_match_all('/^A[0-9]{6}@aylo.net$/', $user->email) == 1) {
                    return true;
                }
            }

            return false;
        });
    }
}
