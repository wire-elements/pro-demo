<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Repository>
 */
class RepositoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'private' => $this->faker->randomElement([0, 1]),
            'name' => $name = $this->faker->unique()->randomElement(['Docs', 'Framework', 'Horizon', 'Valet', 'Passport', 'Octane', 'Breeze', 'Jetstream', 'Telescope', 'Pint', 'Installer', 'Dusk', 'Laravel', 'Sail']),
            'slug' => str($name)->slug()->toString(),
            'description' => $this->faker->text(50),
            'stars' => $this->faker->randomDigit(),
        ];
    }
}
