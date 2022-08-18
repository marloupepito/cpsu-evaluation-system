<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    protected $table = 'faculty';
    use HasFactory;
    protected $fillable = [
        'id_number',
	    'photos',
	    'name',
	    'department',
	    'academic_rank',
	    'status',
	    'year',
    ];
}
