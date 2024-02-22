<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
          'project_name' => fake()->unique()->randomElement(['Phoenix', 'Thunderbolt','Aurora','Odyssey','Eclipse','Serenity','Chimera','Quantum','Titan','Horizon']),
          'project_description' => fake()->sentence(),
          'ownerId' => 1
        ];
    }
}
