<?php 

namespace App\Repositories\Category;

use App\Models\Category;
use Illuminate\Support\LazyCollection;
use Illuminate\Database\Eloquent\Collection;
use App\Repositories\Category\Contracts\CategoriesRepositoryContract;

class SQLCategoriesRepository implements CategoriesRepositoryContract
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