<?php 

namespace App\Repositories\Product;

use App\Models\Product;
use App\Repositories\Product\Contracts\ProductsRepositoryContract;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\LazyCollection;

class SQLProductsRepository implements ProductsRepositoryContract{
    
    public function getProducts(): Collection|LazyCollection
    {
        return Product::query()->lazyById();
    }

}