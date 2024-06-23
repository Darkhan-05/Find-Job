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
        Schema::create('educations', function (Blueprint $table) {
            $table->id();
            $table->string('institution'); // Учебное заведение
            $table->foreignId('degree_id')->constrained()->cascadeOnDelete(); // Степень или квалификация
            $table->string('field_of_study')->nullable(); // Специальность
            $table->date('start_date')->nullable(); // Дата начала
            $table->date('end_date')->nullable(); // Дата окончания
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('education');
    }
};
