<?php

namespace App\Models\Admission;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table        = 'admission_entity__students';
    protected $fillable     = [
        'student_id',
        'student_nisn',
        'student_nik',
        'student_place_birth',
        'student_birthday',
        'student_gender',
        'student_religion',
        'student_address',
        'student_place_sibling',
        'student_sibling',
        'student_achievement',
        'student_father_name',
        'student_father_nik',
        'student_father_study',
        'student_father_religion',
        'student_father_job',
        'student_mother_name',
        'student_mother_nik',
        'student_mother_study',
        'student_mother_religion',
        'student_mother_job',
        'student_parent_value',
        'student_no_kk',
        'student_phone',
        'student_from_school',
        'student_from_school_npsn',
        'student_no_ijazah',
        'student_no_skhun',
        'student_value_exam',
        'student_program',
        'student_boarding',
        'student_sttb_file',
        'student_skhun_file',
        'student_photo_file',
        'student_akta_file',
        'student_kk_file',
        'student_pip_file',
        'student_status',
    ];
    protected $primaryKey   = 'student_id';
}
