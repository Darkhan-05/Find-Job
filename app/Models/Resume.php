<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Resume extends Model
{
    use HasFactory;

    protected $table = 'resumes';
    protected $fillable = [
        'user_id',
        'first_name',
        'middle_name',
        'last_name',
        'age',
        'gender_id',
        'phone',
        'email',
        'address',
        'city_id',
        'experience_id',
        'education_id',
        'skills',
    ];

    public function vacancies(): BelongsToMany
    {
        return $this->belongsToMany(Vacancy::class, 'vacancy_resumes')->withTimestamps();
    }

    public function gender():BelongsTo
    {
        return $this->belongsTo(Gender::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function experience(): BelongsTo
    {
        return $this->belongsTo(Experience::class);
    }

    public function education(): BelongsTo
    {
        return $this->belongsTo(Education::class);
    }
}
