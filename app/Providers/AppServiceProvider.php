<?php

namespace App\Providers;

use App\Services\VortechAPI\Social\CercleService;
use App\Services\VortechAPI\User;
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
        $userApi = new User();
        \View::share('cercles', $cercleI->all());
        if(\Session::has("user_uuid")) {
            \View::share('user', $userApi->info());
        }
    }
}
