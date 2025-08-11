<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class request_document extends Model
{
    use HasFactory;

        public function Requested() {
        return $this->belongsTo(student_information::class,'lrn', 'lrn');
    }
}
