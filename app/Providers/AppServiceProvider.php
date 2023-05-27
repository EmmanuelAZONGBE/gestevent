<?php

namespace App\Providers;

use Illuminate\Auth\Events\Login;
use Illuminate\Pagination\Paginator;


use Illuminate\Support\Facades\Event;

use Illuminate\Support\ServiceProvider;
use App\Notifications\NouvelleNotification;

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
        Paginator::useBootstrapThree();
    }

}

