<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Vacancy extends Model
{
    use HasFactory;

    protected $table = 'vacancies';
    protected $fillable = [
        'name', 'responsibility', 'conditions', 'requirements', 'salary', 'posted_at', 'expired_at', 'company_id', 'city_id', 'employment_type_id','country_id'
    ];

    // public function resumes(): BelongsToMany
    // {
    //     return $this->belongsToMany(Resume::class, 'vacancy_resume')->withTimestamps();
    // }

    public function position(): BelongsTo
    {
        return $this->belongsTo(Position::class);
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function employmentType(): BelongsTo
    {
        return $this->belongsTo(EmployementType::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }
}
