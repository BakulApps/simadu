<?php

namespace App\Imports\Graduate;

use App\Models\Master\Subject;
use App\Models\Graduate\ValueSemester;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ValueSemesterImport implements ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        $heading = $rows[0];
        $body = json_decode(json_encode($rows), true);
        array_splice($body, 0, 1);
        foreach (Subject::all() as $subject) {
            foreach ($body as $row){
                for ($i=0;$i<count($heading);$i++){
                    if ($subject->subject_code == $heading[$i]){
                        ValueSemester::create([
                            'value_point_pg' => $row[$i],
                            'value_point_kt' => $row[$i+1],
                            'student_id' => $row[0],
                            'subject_id' => $subject->subject_id,
                            'semester_id' => request()->post('semester_id'),
                            'year_id' => request()->post('year_id')
                        ]);
                    }
                }
            }
        }
    }
}
