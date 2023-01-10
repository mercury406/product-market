<?php 

namespace App\Repositories\Category;

use App\Models\Category;
use Illuminate\Support\LazyCollection;
use Illuminate\Database\Eloquent\Collection;

class CategoriesRepository implements CategoriesRepositoryInterface
{
    public function getCategories(): Collection|LazyCollection
    {
        return Category::query()
            ->lazyById();
    }

    public function getCategoryById(int $id): Category|null
    {
        return Category::query()
            ->with('products')
            ->find($id);
    }

    public function getCategoryBySlug(string $slug): Category|null
    {
        return Category::query()
            ->with('products')
            ->whereSlug($slug)
            ->first();
    }
}