<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cities')->insert([
            [
                'name' => 'Кокшетау',
                'country_id' => 1
            ],
            [
                'name' => 'Астана',
                'country_id' => 1
            ],
            [
                'name' => 'Алматы',
                'country_id' => 1
            ],
            [
                'name' => 'Талдыкорган',
                'country_id' => 1,
            ],
            [
                'name' => 'Павлодар',
                'country_id' => 1,
            ],
            [
                'name' => 'Шымкет',
                'country_id' => 1,
            ],
            [
                'name' => 'Актау',
                'country_id' => 1
            ],
            [
                'name' => 'Актобе',
                'country_id' => 1
            ],
            [
                'name' => 'Караганда',
                'country_id' => 1
            ],
            [
                'name' => 'Костанай',
                'country_id' => 1
            ],
            [
                'name' => 'Кызылорда',
                'country_id' => 1
            ],
            [
                'name' => 'Петропавловск',
                'country_id' => 1
            ],
            [
                'name' => 'Семей',
                'country_id' => 1
            ],
            [
                'name' => 'Тараз',
                'country_id' => 1
            ],
            [
                'name' => 'Туркестан',
                'country_id' => 1
            ],
            [
                'name' => 'Уральск',
                'country_id' => 1
            ],
            [
                'name' => 'Усть-Каменогорск',
                'country_id' => 1
            ]
        ]);
    }
}
