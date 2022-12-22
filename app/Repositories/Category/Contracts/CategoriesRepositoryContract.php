<?php 

namespace App\Repositores\Category\Contracts;

interface CategoriesRepositoryContract {
    
    /**
     * Retrives all categories
     */
    public function getCategories();

}