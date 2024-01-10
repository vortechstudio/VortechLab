<?php

namespace App\Providers;

use App\Services\VortechAPI\Social\CercleService;
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
        $cercleI = new CercleService();
        \View::share('cercles', $cercleI->all());
    }
}
