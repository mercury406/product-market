<?php 

namespace App\Repositores\Category\Contracts;

interface CategoryRepositoryContract {
    
    /**
     * Retrives all categories
     */
    public function getCategories();

}