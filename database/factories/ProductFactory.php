<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $price = $this->faker->numberBetween($min = 100, $max = 50000);
        return [
            'name' => $this->faker->words(4, true),
            'slug' => $this->faker->words(4, true),
            'description' => $this->faker->paragraph,
            'price' => $price,
            'old_price' => $price + $this->faker->numberBetween($min = 100, $max = 1000),
            'category_id' => function (array $attributes) {
                return Category::inRandomOrder()->first()->id;
            }
        ];
    }
}
