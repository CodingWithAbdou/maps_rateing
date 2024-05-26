<?php

namespace App\Providers;

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
    public function boot(): void
    {
        \Blade::if('owner', function () {
            return auth()->check() && auth()->user()->hasRole('Owner');
        });
        view()->composer(['includes.header', 'includes.category_list'], "App\Http\ViewComposers\CategoryComposer");
    }
}
