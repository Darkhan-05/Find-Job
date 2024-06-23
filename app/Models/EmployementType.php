<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployementType extends Model
{
    use HasFactory;

    protected $table = 'employement_types';
    protected $fillable = ['name'];

}

