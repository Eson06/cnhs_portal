<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class class_monitoring extends Model
{
    use HasFactory;
    protected $fillable = [
        'class_id',
        'grade',
        'section',
    ];
}
