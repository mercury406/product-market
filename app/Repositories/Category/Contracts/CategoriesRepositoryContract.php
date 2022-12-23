<?php 

namespace App\Repositories\Category\Contracts;

use App\Models\Category;

interface CategoriesRepositoryContract {
    
    /**
     * Retrives all categories
     */
    public function getCategories();

    /**
     * Retrieves given category by Id
     * 
     * @param int $id
     */
    public function getCategoryById(int $id);

        /**
     * Retrieves given category by slug
     * 
     * @param string $slug
     */
    public function getCategoryBySlug(string $slug);

}