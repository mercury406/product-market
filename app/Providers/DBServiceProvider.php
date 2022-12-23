<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Product\SQLProductsRepository;
use App\Repositories\Category\SQLCategoriesRepository;
use App\Repositories\Product\Contracts\ProductsRepositoryContract;
use App\Repositories\Category\Contracts\CategoriesRepositoryContract;

class DBServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CategoriesRepositoryContract::class, SQLCategoriesRepository::class);
        $this->app->bind(ProductsRepositoryContract::class, SQLProductsRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
