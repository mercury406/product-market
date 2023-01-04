<?php

namespace Database\Factories;

use App\Enums\OrderStatus;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $productCount = random_int(1, 7);
        $products = [];
        
        for($i = 0; $i < $productCount; $i++){
            array_push($products, [
                'product_id' => Product::query()->inRandomOrder()->first('id')->id,
                'quantity' => random_int(1, 5)
            ]);
        }

        return [
            'status' => OrderStatus::random(),
            'products' => json_encode($products)
        ];
    }
}
