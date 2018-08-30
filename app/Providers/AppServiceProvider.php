<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Configure default key length
		Schema::defaultStringLength(191);
		
		\App\User::observe(\App\Observers\UserObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
		
    }
}
