<?php

use App\Models\Resume;
use App\Models\Vacancy;
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
        Schema::create('vacancy_resume', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Vacancy::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Resume::class)->constrained()->cascadeOnDelete();
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vacancy_resume');
    }
};
