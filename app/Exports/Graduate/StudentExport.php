<?php

namespace App\Exports\Graduate;

use App\Models\Graduate\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\DefaultValueBinder;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use PhpOffice\PhpSpreadsheet\Cell\DataType;

class StudentExport extends DefaultValueBinder implements FromCollection, WithHeadings
{

    public function bindValue(Cell $cell, $value)
    {
        $cell->setValueExplicit($value, DataType::TYPE_STRING2);
        return parent::bindValue($cell, $value);
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Student::OrderBy('student_class')->OrderBy('student_name')->get();
    }

    public function startCell() : string
    {
        return 'B1';
    }

    public function headings(): array
    {
        return ['no', 'nama_lengkap', 'nisn', 'nism', 'kelas', 'tempat_lahir', 'tanggal_lahir', 'jk', 'alamat', 'nama_ayah'];
    }
}
