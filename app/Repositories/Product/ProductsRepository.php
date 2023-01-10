<?php 

namespace App\Repositories\Product;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\LazyCollection;

class ProductsRepository implements ProductsRepositoryInterface
{
    
    public function getProducts(): Collection|LazyCollection
    {
        return Product::query()->lazyById();
    }

    public function getProductBySlug(string $slug)
    {
        return Product::query()
            ->whereSlug($slug)
            ->firstOrFail();
    }

}