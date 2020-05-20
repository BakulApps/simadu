<?php

namespace App\Imports\Graduate;

use App\Models\Graduate\Master\Subject;
use App\Models\Graduate\ValueExam;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ValueExamImport implements ToCollection
{
    /**
    * @param Collection $collection
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
                        ValueExam::create([
                            'value_point' => $row[$i],
                            'student_id' => $row[0],
                            'subject_id' => $subject->subject_id
                        ]);
                    }
                }
            }
        }
    }
}
