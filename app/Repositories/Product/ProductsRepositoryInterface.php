<?php 

namespace App\Repositories\Product;

interface ProductsRepositoryInterface {
    
    /**
     * Retrives all products
     */
    public function getProducts();

    /**
     * Retrives product by Slug
     * 
     * @param string $slug
     */
    public function getProductBySlug(string $slug);

}