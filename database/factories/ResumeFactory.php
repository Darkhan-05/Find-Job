<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Country;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Gender;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Resume>
 */
class ResumeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'first_name' => $this->faker->firstName,
            'middle_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'age' => $this->faker->numberBetween(18, 65),
            'gender_id' => Gender::inRandomOrder()->first()->id,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->safeEmail,
            'address' => $this->faker->address,
            'skills' => $this->faker->words(3, true),
            'country_id' => Country::inRandomOrder()->first()->id,
            'city_id' => City::inRandomOrder()->first()->id,
            'education_id' => Education::factory(),
            'experience_id' => Experience::factory(),
        ];
    }
}
