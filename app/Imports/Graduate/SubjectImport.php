<?php

namespace App\Imports\Graduate;

use App\Models\Master\Subject;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SubjectImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Subject([
            'subject_number' => $row['no_urut'],
            'subject_code' => $row['kode_mapel'],
            'subject_name' => $row['nama_mapel'],
            'subject_desc' => $row['diskripsi_mapel'],
        ]);
    }


}
