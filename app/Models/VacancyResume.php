<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class VacancyResume extends Model
{
    use HasFactory;

    protected $table = 'vacancy_resume';

    protected $fillable = [
        'vacancy_id', 'resume_id', 'status',
    ];

    public function resumes(): BelongsToMany
    {
        return $this->belongsToMany(Resume::class);
    }

    public function vacancies(): BelongsToMany
    {
        return $this->BelongsToMany(Vacancy::class);
    }
}
