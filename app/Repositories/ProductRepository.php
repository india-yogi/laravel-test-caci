<?php

namespace App\Repositories;

use App\Interfaces\ProductRepositoryInterface;
use App\Models\Product;

class ProductRepository implements ProductRepositoryInterface 
{
    /**
     * Get all the Product records as of now without pagination,
     * later on we can add pagination, searchin & sorting
     */
    public function getAllProduct() 
    {
        return Product::all();
    }

    /**
     * Get single sale record based on id
     */
    public function getProductById($productId) 
    {
        return Product::findOrFail($productId);
    }

    /**
     * Delete single sale record based on id
     */    
    public function deleteProduct($productId) 
    {
        Product::destroy($productId);
    }

    /**
     * Add new single sale record into the DB using Model
     */      
    public function createProduct(array $saleDetails)
    {
        return Product::create($saleDetails);
    }

    /**
     * Update   single sale record into the DB using Model
     */    
    public function updateProduct($productId, array $newDetails) 
    {
        return Product::whereId($productId)->update($newDetails);
    }
}
