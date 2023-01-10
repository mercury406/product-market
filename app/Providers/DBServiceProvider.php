<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\Order\OrderRepository;
use App\Repositories\Product\ProductsRepository;
use App\Repositories\Category\CategoriesRepository;
use App\Repositories\Order\OrderRepositoryInterface;
use App\Repositories\Product\ProductsRepositoryInterface;
use App\Repositories\Category\CategoriesRepositoryInterface;

class DBServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CategoriesRepositoryInterface::class, CategoriesRepository::class);
        $this->app->bind(ProductsRepositoryInterface::class, ProductsRepository::class);
        $this->app->bind(OrderRepositoryInterface::class, OrderRepository::class);
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
