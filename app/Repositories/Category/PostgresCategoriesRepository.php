<?php 

namespace App\Repositores\Category;

use App\Models\Category;
use App\Repositores\Category\Contracts\CategoryRepositoryContract;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\LazyCollection;

class PostgresCategoriesRepository implements CategoryRepositoryContract
{
    public function getCategories(): Collection|LazyCollection
    {
        return Category::query()->lazyById();
    }
}