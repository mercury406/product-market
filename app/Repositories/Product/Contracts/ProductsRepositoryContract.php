<?php 

namespace App\Repositores\Product\Contracts;

interface ProductsRepositoryContract {
    
    /**
     * Retrives all categories
     */
    public function getProducts();

}