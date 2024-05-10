<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\SalesRepositoryInterface;
use App\Repositories\SalesRepository;

use App\Interfaces\ProductRepositoryInterface;
use App\Repositories\ProductRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register() 
    {
        $this->app->bind(SalesRepositoryInterface::class, SalesRepository::class);
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
     }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
