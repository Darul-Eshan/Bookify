<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // 1. Admin Panel General Access (Super Admin, Admin, Executive, Moderator)
        Gate::define('admin-access', function (User $user) {
            return in_array($user->role, ['super_admin', 'admin', 'executive', 'moderator']);
        });

        // 2. Executive Level & Above Access
        Gate::define('is-executive-above', function (User $user) {
            return in_array($user->role, ['super_admin', 'admin', 'executive']);
        });

        // 3. Admin Level & Above Access
        Gate::define('is-admin-above', function (User $user) {
            return in_array($user->role, ['super_admin', 'admin']);
        });

        // 4. Super Admin Only Access
        Gate::define('is-super-admin', function (User $user) {
            return $user->role === 'super_admin';
        });
    }
}