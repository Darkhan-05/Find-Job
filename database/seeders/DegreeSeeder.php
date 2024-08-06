<?php

namespace Database\Seeders;

use App\Models\Degree;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DegreeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('degrees')->insert([
            ['name' => 'Неоконоченное среднее'],
            ['name' => 'Неоконченное высшее'],
            ['name' => 'Среднее (Колледж)'],
            ['name' => 'Среднее (Школьное)'],
            ['name' => 'Бакалавриат'],
            ['name' => 'Магистратура'],
            ['name' => 'Докторантура'],
            ['name' => 'Аспирентура'],
        ]);
    }
}
