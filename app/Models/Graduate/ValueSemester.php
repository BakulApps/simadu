<?php

namespace App\Models\Graduate;

use Illuminate\Database\Eloquent\Model;

class ValueSemester extends Model
{
    protected $connection   = 'graduate';
    protected $table        = 'entity__student_value_semesters';
    protected $fillable     = [
        'value_id',
        'value_point',
        'student_id',
        'subject_id',
        'semester_id',
        'year_id',
    ];
    protected $primaryKey   = 'value_id';
    public $timestamps      = false;
}
