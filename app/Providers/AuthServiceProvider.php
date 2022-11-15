<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
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

        Gate::define('AuthMaster', function () {
            return auth()->user()->utype == "AuthMaster";
        });

        Gate::define('AuthCRO', function () {
            return auth()->user()->utype == "AuthCRO";
        });

        Gate::define('AuthSalesManager', function () {
            return auth()->user()->utype == "AuthSalesManager";
        });

        Gate::define('AuthSales', function () {
            return auth()->user()->utype == "AuthSales";
        });
    }
}
