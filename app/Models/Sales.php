<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Sales extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity',
        'unit_cost',
        'selling_price',
    ];

    protected $casts = [
        'quantity' => 'int',
        'unit_cost' => 'double',
        'selling_price' => 'double',
    ];

    /**
     * Get the selling_price.
     */
    protected function sellingPrice(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => number_format($value, 2),
        );
    }    

    /**
     * Get the unit_cost.
     */
    protected function unitCost(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => number_format($value, 2),
        );
    }
    
    // // Mutator for selling_price column
    // public function setSellingPriceAttribute($value)
    // {
    //     $this->attributes['selling_price'] = number_format($value, 2);
    // }    
}
