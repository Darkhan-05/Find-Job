<?php

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
            $table->string('name');
            $table->foreignId('company_id')->constrained()->cascadeOnDelete();
            $table->string('responsibility'); // Обязанности
            $table->string('conditions'); // Условия
            $table->string('requirements'); // Требования
            $table->foreignId('employement_type_id')->constrained()->cascadeOnDelete();
            $table->foreignId('country_id')->constrained()->cascadeOnDelete();
            $table->foreignId('city_id')->constrained()->cascadeOnDelete();
            $table->integer('salary')->nullable();
            $table->date('posted_at')->useCurrent();
            $table->date('expired_at')->nullable();
            $table->foreignId('status_id')->default(1)->required()->constrained()->cascadeOnDelete();
            $table->foreignId('position_id')->constrained()->cascadeOnDelete();
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
