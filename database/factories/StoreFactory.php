<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Store>
 */
class StoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'city_id' => fake()->numberBetween(1,10),
            'store_name' => fake()->company(),
            'address' => fake()->city(),
            'contact_number' => fake()->phoneNumber(),
        ];
    }
}
