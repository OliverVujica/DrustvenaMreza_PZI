<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Objava;
use App\Models\User;
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
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('admin', function(User $user) : bool {
            return (bool) $user->is_admin;
        });

        Gate::define('objava.delete', function(User $user, Objava $objava) : bool {
            return ((bool) $user->is_admin || $user->id === $objava->user_id);
        });

        Gate::define('objava.edit', function(User $user, Objava $objava) : bool {
            return ((bool) $user->is_admin || $user->id === $objava->user_id);
        });

        Gate::define('korisnik.edit', function(User $user, User $model) : bool {
            return $user->id === $model->id;
        });
    }
}
