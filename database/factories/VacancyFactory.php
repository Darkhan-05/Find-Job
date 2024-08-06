<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Company;
use App\Models\Country;
use App\Models\EmploymentType;
use App\Models\Position;
use App\Models\User;
use App\Models\VacancyStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vacancy>
 */
class VacancyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->jobTitle,
            'user_id' => 3,
            'company_id' => Company::inRandomOrder()->first()->id,
            'description' => $this->faker->sentence,
            'responsibility' => $this->faker->sentence,
            'conditions' => $this->faker->sentence,
            'requirements' => $this->faker->sentence,
            'employment_type_id' => EmploymentType::inRandomOrder()->first()->id, // случайный существующий id
            'country_id' => Country::inRandomOrder()->first()->id,
            'city_id' => City::inRandomOrder()->first()->id,
            'salary' => $this->faker->optional()->numberBetween(30000, 120000),
            'posted_at' => $this->faker->date,
            'expired_at' => $this->faker->optional()->date,
            'vacancy_status_id' => VacancyStatus::inRandomOrder()->first()->id,
            'position_id' => Position::inRandomOrder()->first()->id,
        ];
    }
}
