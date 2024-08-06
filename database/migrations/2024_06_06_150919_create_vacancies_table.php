<?php

use App\Models\City;
use App\Models\Company;
use App\Models\Country;
use App\Models\EmploymentType;
use App\Models\Position;
use App\Models\User;
use App\Models\VacancyStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vacancies', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Company::class)->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('description'); // Описание
            $table->string('responsibility'); // Обязанности
            $table->string('conditions'); // Условия
            $table->string('requirements'); // Требования
            $table->foreignIdFor(EmploymentType::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Country::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(City::class)->constrained()->cascadeOnDelete();
            $table->integer('salary')->nullable();
            $table->date('posted_at')->useCurrent();
            $table->date('expired_at')->nullable();
            $table->foreignIdFor(VacancyStatus::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Position::class)->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vacancies');
    }
};
