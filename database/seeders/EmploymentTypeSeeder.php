<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmploymentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('employment_types')->insert([
           ['name' => 'remote'],
           ['name' => 'on-site'],
           ['name' => 'hybrid'],
           ['name' => 'full-time'],
           ['name' => 'part-time'],
           ['name' => 'freelance'],
           ['name' => 'contract'],
           ['name' => 'internship'],
           ['name' => 'consultant'],
        ]);
    }
}
