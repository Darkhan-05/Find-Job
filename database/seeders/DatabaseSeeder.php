<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Company;
use App\Models\Country;
use App\Models\Degree;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Resume;
use App\Models\User;
use App\Models\Vacancy;
use App\Models\VacancyStatus;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CountrySeeder::class,
            DegreeSeeder::class,
            GenderSeeder::class,
            PositionSeeder::class,
            VacancyStatusSeeder::class,
            EmploymentTypeSeeder::class,
        ]);

        City::factory()->count(5)->create();
        Company::factory()->count(6)->create();
        Resume::factory()->count(10)->create();
        Vacancy::factory()->count(10)->create();
    }
}
