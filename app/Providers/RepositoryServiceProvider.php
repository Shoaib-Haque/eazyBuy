<?php

namespace App\Providers;

use App\Repository\Interfaces\IAdminRepository;
use App\Repository\Eloquent\AdminRepository;
use App\Repository\Interfaces\ICustomerRepository;
use App\Repository\Eloquent\CustomerRepository; 
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IAdminRepository::class, AdminRepository::class);
        $this->app->bind(ICustomerRepository::class, CustomerRepository::class);
    }
}
