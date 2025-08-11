<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subject extends Model
{
    use HasFactory;

         public function room_assign() {
        return $this->belongsTo(class_monitoring::class,'grade_section', 'class_id');
    }
}
