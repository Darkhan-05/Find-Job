<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $table = 'experiences';
    protected $fillable = ['company', 'position', 'start_date', 'end_date', 'description', 'city_id'];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
