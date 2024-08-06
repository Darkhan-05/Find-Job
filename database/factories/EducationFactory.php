<?php

namespace Database\Factories;

use App\Models\Degree;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Education>
 */
class EducationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'institution' => $this->faker->company,
            'degree_id' => Degree::inRandomOrder()->first()->id,
            'field_of_study' => $this->faker->word,
            'start_date' => $this->faker->date,
            'end_date' => $this->faker->optional()->date,
        ];
    }
}
