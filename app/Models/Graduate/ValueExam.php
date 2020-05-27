<?php

namespace App\Models\Graduate;

use Illuminate\Database\Eloquent\Model;

class ValueExam extends Model
{
    protected $table        = 'graduate_entity__value_exams';
    protected $fillable     = [
        'value_id',
        'value_point',
        'student_id',
        'subject_id'
    ];
    protected $primaryKey   = 'value_id';
    public $timestamps      = false;
}
