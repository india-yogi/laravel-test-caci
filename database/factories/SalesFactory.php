<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Helpers\Helper;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sales>
 */
class SalesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $quantity = $this->faker->numberBetween($min = 1, $max = 200);
        $unit_cost = $this->faker->randomFloat(2, 10, 50);

        $selling_price = Helper::calculateSellingCost($quantity, $unit_cost);

        return [
            'quantity' => $quantity,
            'unit_cost' => $unit_cost,
            'selling_price' => $selling_price,
        ];
    }
}
