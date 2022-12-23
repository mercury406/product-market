<?php 

namespace App\Repositories\Product\Contracts;

interface ProductsRepositoryContract {
    
    /**
     * Retrives all categories
     */
    public function getProducts();

}