<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{

    public function run(): void
    {
        DB::table('countries')->insert([
            ['name' => 'Казахстан','id' => 1],
            ['name' => 'Россия', 'id' => 2],
        ]);
    }
}
