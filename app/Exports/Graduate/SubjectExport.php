<?php

namespace App\Exports\Graduate;

use Maatwebsite\Excel\Concerns\FromArray;

class SubjectExport implements FromArray
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function array() : array
    {
        return [['no_urut', 'kode_mapel', 'nama_mapel', 'diskripsi_mapel']];
    }
}
