<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\UserResponse;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserResponseFactory extends Factory
{
    protected $model = UserResponse::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
                    'firstname' => $this->faker->firstName(),
                    'lastname' => $this->faker->lastName(),
                    'patronymic' => $this->faker->lastName(),
                    'email' => $this->faker->email(),
                    'phone' => $this->faker->e164PhoneNumber(),
                    'message' => $this->faker->text($maxNbChars = 200),
                    'product_id' => $this->faker->numberBetween(1, 10),
                ];
    }
}
