<?php

namespace App\Interfaces;

interface SalesRepositoryInterface 
{
    public function getAllSales();
    public function getSalesById($orderId);
    public function deleteSales($orderId);
    public function createSales(array $orderDetails);
    public function updateSales($orderId, array $newDetails);
}
