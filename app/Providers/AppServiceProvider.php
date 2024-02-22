<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

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

     // Ovo je bootstrapova funkcija za paginator, da bi ljepse izgledao!!
    public function boot(): void
    {
        Paginator::useBootstrapFive();
    }
}
