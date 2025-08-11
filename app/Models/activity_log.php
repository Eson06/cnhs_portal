<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class activity_log extends Model
{
    use HasFactory;
    protected $fillable = [
        'lrn',
        'activity',
    ];

        public function aluser() {
        return $this->belongsTo(user::class,'lrn', 'lrn');
    }
}
