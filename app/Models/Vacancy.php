<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Vacancy extends Model
{
    use HasFactory;

    protected $table = 'vacancies';
    protected $fillable = [
        'user_id', 'name', 'description', 'responsibility', 'conditions', 'requirements', 'salary', 'posted_at', 'expired_at', 'company_id', 'city_id', 'employment_type_id', 'country_id', 'vacancy_status_id', 'position_id'
    ];

    public function scopeIsPublished()
    {
        return $this->where('vacancy_status_id', 1);
    }

    public function resumes(): BelongsToMany
    {
        return $this->belongsToMany(Resume::class, 'vacancy_resume')->withPivot('status')->withTimestamps();
    }

    public function vacancyResumes(): HasMany
    {
        return $this->hasMany(VacancyResume::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function position(): BelongsTo
    {
        return $this->belongsTo(Position::class);
    }

    public function vacancyStatus(): BelongsTo
    {
        return $this->belongsTo(VacancyStatus::class);
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function employmentType(): BelongsTo
    {
        return $this->belongsTo(EmploymentType::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }
}
