<?php

namespace App\Helpers;

class Helper
{
    const PROFIT_MARGIN = 0.25; // 25% of the total cost (qty * unit cost)
    const SHIPPING_COST = 10; // fixed cost, it can be added some where in the config or in the DB too

    public static function calculateSellingCost(float $quantity, float $unit_cost)
    {      
        $selling_price = (($quantity * $unit_cost) / (1 - self::PROFIT_MARGIN)) + self::SHIPPING_COST;        
        return $selling_price;
    }
}