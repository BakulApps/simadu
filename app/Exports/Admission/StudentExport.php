<?php

namespace App\Exports\Admission;

use App\Models\Admission\Student;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Cell\StringValueBinder;

class StudentExport extends StringValueBinder implements FromArray, WithHeadings, WithCustomValueBinder
{

    public function array() : array
    {
        foreach (Student::OrderBy('created_at')->get() as $student){
            $students[] = [
                $student->student_id, $student->created_at, $student->student_name, $student->student_nisn, $student->student_nik,
                $student->student_place_birth, $student->student_birthday, $student->student_gender, $student->student_religion,
                $student->student_address, $student->student_place_sibling, $student->student_sibling, $student->student_achievement,
                $student->student_no_kk, $student->student_father_name, $student->student_father_nik, $student->student_father_study,
                $student->student_father_religion, $student->student_father_job, $student->student_mother_name,
                $student->student_mother_nik, $student->student_mother_study, $student->student_mother_religion,
                $student->student_mother_job, $student->student_parent_value, $student->student_phone,
                $student->student_from_school, $student->student_from_school_npsn, $student->student_no_ijazah,
                $student->student_no_skhun, $student->student_value_exam,
                $student->student_status == 1 ? 'Diterima' : 'Ditolak', !empty($student->student_pip_file) ? 'Ya' : 'Tdk',
            ];
        }
        return $students;
    }

    public function startCell() : string
    {
        return 'B1';
    }

    public function headings(): array
    {
        return [
            'No', 'Tanggal Pendaftaran', 'Nama Lengkap', 'NISN', 'NIK', 'Tempat Lahir',
            'Tanggal Lahir', 'JK', 'Agama', 'Alamat', 'Anak Ke', 'Jumlah Saudara', 'Prestasi',
            'Nomor KK', 'Nama Ayah', 'NIK Ayah', 'Agama Ayah', 'Pendidikan Ayah', 'Pekerjaan Ayah',
            'Nama Ibu', 'NIK Ibu', 'Agama Ibu', 'Pendidikan Ibu', 'Pekerjaan Ibu', 'Penghasilan Ortu',
            'Nomor HP Ortu', 'Nama Sekolah Asal', 'NPSN Sekolah Asal', 'Nomor Ijazah', 'Nomor SKHUN',
            'Nilai Ujian', 'status', 'Pererima Bantuan',
        ];
    }
}
