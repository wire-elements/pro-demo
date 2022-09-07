<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Release>
 */
class ReleaseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'tag' => 'v'.$this->faker->randomDigitNotNull().'.'.$this->faker->randomDigit().'.'.$this->faker->biasedNumberBetween(0, 30),
            'created_at' => $createdAt = now()->subDays($this->faker->randomDigit()),
            'updated_at' => $createdAt,
        ];
    }
}
