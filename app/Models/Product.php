<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];    

    /**
    * Get the sales this product has
    */
    public function sales() {
        return $this->hasMany(App\Model\Sale::class, 'product_id', 'id'); 
    }    
}
