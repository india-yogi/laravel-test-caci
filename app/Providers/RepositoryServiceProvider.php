<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\SalesRepositoryInterface;
use App\Repositories\SalesRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register() 
    {
        $this->app->bind(SalesRepositoryInterface::class, SalesRepository::class);
     }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
