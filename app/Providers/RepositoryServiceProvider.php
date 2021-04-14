<?php

namespace App\Providers;

use App\Repository\EloquentRepositoryInterface; 
use App\Repository\AdminRepositoryInterface; 
use App\Repository\Eloquent\AdminRepository; 
use App\Repository\Eloquent\BaseRepository; 
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
        $this->app->bind(EloquentRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(AdminRepositoryInterface::class, AdminRepository::class);
    }
}
