<?php 

namespace App\Repositores\Category;

use App\Models\Category;
use Illuminate\Support\LazyCollection;
use Illuminate\Database\Eloquent\Collection;
use App\Repositores\Category\Contracts\CategoriesRepositoryContract;

class PostgresCategoriesRepository implements CategoriesRepositoryContract
{
    public function getCategories(): Collection|LazyCollection
    {
        return Category::query()->lazyById();
    }
}