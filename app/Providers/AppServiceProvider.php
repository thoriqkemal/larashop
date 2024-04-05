<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        // $this->registerPolicies();
        Gate::define('manage-users', function($user) {
            return count(array_intersect(['ADMIN'], json_decode($user->roles)));
        });

        Gate::define('manage-categories', function($user) {
            return count(array_intersect(['ADMIN', 'STAFF'], json_decode($user->roles)));
        });

        Gate::define('manage-books', function($user) {
            return count(array_intersect(['ADMIN', 'STAFF'], json_decode($user->roles)));
        });

        Gate::define('manage-orders', function($user) {
            return count(array_intersect(['ADMIN', 'STAFF'], json_decode($user->roles)));
        });

    }
}