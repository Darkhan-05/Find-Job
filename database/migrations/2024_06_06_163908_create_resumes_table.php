<?php

use App\Models\City;
use App\Models\Country;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Gender;
use App\Models\User;
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
            $table->foreignIdFor(User::class);
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name')->nullable();
            $table->tinyInteger('age')->nullable();
            $table->foreignIdFor(Gender::class);
            $table->string('phone');
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('skills');
            $table->foreignIdFor(Country::class);
            $table->foreignIdFor(City::class);
            $table->foreignIdFor(Education::class);
            $table->foreignIdFor(Experience::class);
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
