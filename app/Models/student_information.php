<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student_information extends Model
{
    use HasFactory;

    protected $fillable = [
        'lrn',
        'first_name',
        'middle_name',
        'last_name',
        'gender',
        'birthday',
        'address',
        'contact_number',
        'email',
        'ec_fullname',
        'ec_contactnumber',
        'ec_address',
        'ec_relationship',
        'ip',
    ];

    public function enrolled() {
       return $this->hasOne(enrollment_status::class, 'lrn', 'lrn')->latest('school_year');
    }

          public function logincredential() {
        return $this->belongsTo(user::class,'lrn', 'lrn');
    }
}
