<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Education extends Model
{
    use HasFactory;

    protected $table = 'educations';
    protected $fillable = ['institution', 'degree_id', 'field_of_study', 'start_date', 'end_date'];

    public function degree(): BelongsTo
    {
        return $this->belongsTo(Degree::class);
    }

}
