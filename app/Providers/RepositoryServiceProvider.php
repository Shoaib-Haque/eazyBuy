<?php

namespace App\Providers;

use App\Repository\Interfaces\IAdminRepository;
use App\Repository\Eloquent\AdminRepository;
use App\Repository\Interfaces\ICustomerRepository;
use App\Repository\Eloquent\CustomerRepository; 
use App\Repository\Interfaces\IDepartmentRepository;
use App\Repository\Eloquent\DepartmentRepository;
use App\Repository\Interfaces\ICategoryRepository;
use App\Repository\Eloquent\CategoryRepository;
use App\Repository\Interfaces\IBrandRepository;
use App\Repository\Eloquent\BrandRepository; 
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
        $this->app->bind(IDepartmentRepository::class, DepartmentRepository::class);
        $this->app->bind(ICategoryRepository::class, CategoryRepository::class);
        $this->app->bind(IBrandRepository::class, BrandRepository::class);
    }
}
