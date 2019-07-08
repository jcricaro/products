<?php

namespace App\Providers;

use App\CT\Repositories\Json\JsonProductRepository;
use App\CT\Repositories\ProductRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ProductRepository::class, JsonProductRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
