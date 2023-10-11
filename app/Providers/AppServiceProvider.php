<?php

namespace App\Providers;


use Illuminate\Pagination\Paginator;
use Illuminate\Support\facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        schema::defaultStringLength(191);
        Paginator::useBootstrap();

        
    }
}
