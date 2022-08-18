<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Results extends Model
{
    protected $table = 'results';
    use HasFactory;
    protected $fillable = [
        'start',
	    'end',
	    'semester',
	    'status',
    ];
}
