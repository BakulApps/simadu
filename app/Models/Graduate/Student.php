<?php

namespace App\Models\Graduate;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table        = 'graduate_entity__students';
    protected $fillable     = [
        'student_id',
        'student_name',
        'student_nisn',
        'student_nism',
        'student_class',
        'student_place_birth',
        'student_birthday',
        'student_gender',
        'student_address',
        'student_parent',
    ];
    protected $primaryKey   = 'student_id';
    public $timestamps      = false;
}
