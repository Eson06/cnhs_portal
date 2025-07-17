<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class enrollment_status extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'lrn',
        'ip',
        'transferee',
        'status',
        'enrollment_type',
        'school_year',
    ];
}
