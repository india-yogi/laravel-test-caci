<?php

namespace App\Repositories;

use App\Interfaces\SalesRepositoryInterface;
use App\Models\Sales;

class SalesRepository implements SalesRepositoryInterface 
{
    /**
     * Get all the sales records as of now without pagination,
     * later on we can add pagination, searchin & sorting
     */
    public function getAllSales() 
    {
        return Sales::all();
    }

    /**
     * Get single sale record based on id
     */
    public function getSalesById($saleId) 
    {
        return Sales::findOrFail($saleId);
    }

    /**
     * Delete single sale record based on id
     */    
    public function deleteSales($saleId) 
    {
        Sales::destroy($saleId);
    }

    /**
     * Add new single sale record into the DB using Model
     */      
    public function createSales(array $saleDetails)
    {
        return Sales::create($saleDetails);
    }

    /**
     * Update   single sale record into the DB using Model
     */    
    public function updateSales($saleId, array $newDetails) 
    {
        return Sales::whereId($saleId)->update($newDetails);
    }
}
