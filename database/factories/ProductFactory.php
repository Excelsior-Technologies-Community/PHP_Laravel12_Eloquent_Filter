<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        $categories = ['Electronics', 'Clothing', 'Books', 'Home & Garden', 'Sports'];
        $brands = ['Apple', 'Samsung', 'Nike', 'Sony', 'LG', 'Adidas', 'Dell', 'HP'];

        return [
            'name' => $this->faker->words(3, true),
            'description' => $this->faker->paragraph(),
            'price' => $this->faker->randomFloat(2, 10, 1000),
            'stock' => $this->faker->numberBetween(0, 100),
            'category' => $this->faker->randomElement($categories),
            'brand' => $this->faker->randomElement($brands),
            'is_active' => $this->faker->boolean(80),
        ];
    }
}