<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Results extends Model
{
    protected $table = 'results';
    use HasFactory;
    protected $fillable = [
        'evaluatee_id',
        'evaluator_id',
        'commitment',
        'kos',
        'til',
        'mol',
        'total',
        'comment',
        'school_year',
        'section',
        'semester',
        'department',
        'academic_rank',
        'status',
        'year',
    ];
}
