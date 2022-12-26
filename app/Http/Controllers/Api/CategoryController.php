<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Repositories\Category\Contracts\CategoriesRepositoryContract;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryController extends Controller
{
    public $repository;

    public function __construct(CategoriesRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResource
    {
        return CategoryResource::collection($this->repository->getCategories());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Category\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        // return $this->repository->createCategoryFromRequest();
    }

    /**
     * Display the specified resource.
     *
     * @param string $slug
     * @throws Exception
     * @return \Illuminate\Http\Resources\Json\JsonResource
     */
    public function show(string $slug): JsonResource
    {
        return new CategoryResource($this->repository->getCategoryBySlug($slug));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Category\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
