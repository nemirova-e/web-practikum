<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {
        return [
                'name' =>  'Продукт' . ' ' . $this->faker->sentence(rand(1, 2)),
                'rate' =>  $this->faker-> numberBetween(2, 15),
                'months' => $this->faker-> numberBetween(6, 15),
                'category_id' => $this->faker->numberBetween(1, 3),
                'insurance_company_id' => $this->faker->numberBetween(1, 9),
                ];
    }
}
