<?php

namespace App\Models\Graduate;

use Illuminate\Database\Eloquent\Model;

class ValueSemester extends Model
{
    protected $table        = 'graduate_entity__value_semesters';
    protected $fillable     = [
        'value_id',
        'value_point_pg',
        'value_point_kt',
        'student_id',
        'subject_id',
        'semester_id',
        'year_id',
    ];
    protected $primaryKey   = 'value_id';
    public $timestamps      = false;

    protected $setStudentId;
    protected $setSubjectId;

    public function setStudent($student_id)
    {
        $this->setStudentId = $student_id;
    }

    public function setSubject($subject_id)
    {
        $this->setSubjectId = $subject_id;
    }

    public function value_pg($semester_id, $year_id)
    {
        return self::where('student_id', $this->setStudentId)
            ->where('subject_id', $this->setSubjectId)
            ->where('semester_id', $semester_id)
            ->where('year_id', $year_id)
            ->value('value_point_pg');
    }

    public function value_kt($semester_id, $year_id)
    {
        return self::where('student_id', $this->setStudentId)
            ->where('subject_id', $this->setSubjectId)
            ->where('semester_id', $semester_id)
            ->where('year_id', $year_id)
            ->value('value_point_kt');
    }
}
