<?php

namespace App\Providers;

use App\Services\AdminService;
use App\Services\Contracts\IAdminService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(IAdminService::class, AdminService::class); // everytime bind interface of a service layer, so u can abstract ur business login from the controller.
        // You can bind other services here as needed
        // $this->app->bind(IExampleService::class, ExampleService::class); // Example for another service binding 'I' refer to interface
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
