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
        Schema::create('resumes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->tinyInteger('age');
            $table->foreignId('gender_id')->constrained()->cascadeOnDelete();
            $table->string('phone');
            $table->string('email');
            $table->string('address');
            $table->foreignId('city_id')->constrained()->cascadeOnDelete();
            $table->string('skills');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resumes');
    }
};
