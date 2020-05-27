<?php

namespace App\Http\Controllers\Graduate;

use App\Exports\Graduate\ValueExamExport;
use App\Exports\Graduate\ValueSemesterExport;
use App\Http\Controllers\Controller;
use App\Imports\Graduate\ValueExamImport;
use App\Imports\Graduate\ValueSemesterImport;
use App\Models\Master\Subject;
use App\Models\Graduate\Setting;
use App\Models\Graduate\Student;
use App\Models\Graduate\ValueExam;
use App\Models\Graduate\ValueSemester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class ValueController extends Controller
{
    public function semester(Request $request)
    {
        if ($request->isMethod('post')){
            if ($request->_type == 'data' && $request->_data == 'all'){
                foreach (Student::OrderBy('student_class')->OrderBy('student_name')->get()  as $student){
                    $value = [];
                    foreach (Subject::OrderBy('subject_number')->get() as $subject){
                        $value[] = ValueSemester::where('student_id', $student->student_id)
                            ->where('subject_id', $subject->subject_id)
                            ->where('semester_id', $request->semester_id)
                            ->where('year_id', $request->year_id)
                            ->value('value_point_pg');
                        $value[] = ValueSemester::where('student_id', $student->student_id)
                            ->where('subject_id', $subject->subject_id)
                            ->where('semester_id', $request->semester_id)
                            ->where('year_id', $request->year_id)
                            ->value('value_point_kt');
                    }
                    $data[] = array_merge([$student->student_name], $value);
                }
                $msg['data'] = empty($data) ? [] : $data;
            }
            elseif ($request->_type == 'data' && $request->_data == 'upload'){
                $validator = Validator::make($request->all(), [
                    'value_semester' => 'mimes:xls,xlsx'
                ]);
                if ($validator->fails()) {
                    $msg = ['title' => 'Kesalahan !', 'class' => 'danger', 'text' => 'Berkas Harus Berekstensi xls/xlsx'];
                }
                else {
                    if ($request->hasFile('value_semester')) {
                        $file = $request->file('value_semester')->store('temp');
                        $path = storage_path('app') .'/'. $file;
                        ValueSemester::where('year_id', $request->year_id)->where('semester_id', $request->semester_id)->delete();
                        if (Excel::import(new ValueSemesterImport, $path)){
                            $msg = ['title' => 'Berhasil !', 'class' => 'success', 'text' => 'Nilai Semester Berhasil ditambahkan'];
                        }
                        else {
                            $msg = ['title' => 'Gagal !', 'class' => 'danger', 'text' => 'Nilai Semester gagal ditambahkan'];
                        }
                    }
                }
            }
            return response()->json($msg);
        }
        elseif ($request->_type == 'download' && $request->_data == 'value_semester'){
            return Excel::download(new ValueSemesterExport, 'nilai_semester.xlsx');
        }
        else {
            return view('graduate.admin.value_semester');
        }
    }

    public function exam(Request $request)
    {
        if ($request->isMethod('post')){
            if ($request->_type == 'data' && $request->_data == 'all'){
                foreach (Student::OrderBy('student_class')->OrderBy('student_name')->get()  as $student){
                    $value = [];
                    foreach (Subject::OrderBy('subject_number')->get() as $subject){
                        $value[] = [ValueExam::where('student_id', $student->student_id)
                            ->where('subject_id', $subject->subject_id)
                            ->value('value_point')];
                    }
                    $data[] = array_merge([$student->student_name], $value);
                }
                $msg['data'] = empty($data) ? [] : $data;
            }
            elseif ($request->_type == 'data' && $request->_data == 'upload'){
                $validator = Validator::make($request->all(), [
                    'value_exam' => 'mimes:xls,xlsx'
                ]);
                if ($validator->fails()) {
                    $msg = ['title' => 'Kesalahan !', 'class' => 'danger', 'text' => 'Berkas Harus Berekstensi xls/xlsx'];
                }
                else {
                    if ($request->hasFile('value_exam')) {
                        $file = $request->file('value_exam')->store('temp');
                        $path = storage_path('app') .'/'. $file;
                        ValueExam::query()->truncate();
                        if (Excel::import(new ValueExamImport, $path)){
                            $msg = ['title' => 'Berhasil !', 'class' => 'success', 'text' => 'Nilai Ujian Berhasil ditambahkan'];
                        }
                        else {
                            $msg = ['title' => 'Kesalahan !', 'class' => 'danger', 'text' => 'Nilai Ujian Gagal ditambahkan'];
                        }
                    }
                }
            }
            return response()->json($msg);
        }
        elseif ($request->_type == 'download' && $request->_data == 'value_exam'){
            return Excel::download(new ValueExamExport, 'nilai_ujian.xlsx');
        }
        else {
            return view('graduate.admin.value_exam');
        }
    }

    public function ijazah(Request $request){
        if ($request->isMethod('post')){
            if ($request->_type == 'data' && $request->_data == 'all'){
                foreach (Student::OrderBy('student_class')->OrderBy('student_name')->get()  as $student){
                    $value = [];
                    foreach (Subject::OrderBy('subject_number')->get() as $subject){
                        $value[] =
                            ((ValueSemester::where('student_id', $student->student_id)
                            ->where('subject_id', $subject->subject_id)
                            ->average('value_point_pg') * Setting::value('setting_value_semester_point')) +
                            (ValueExam::where('student_id', $student->student_id)
                                ->where('subject_id', $subject->subject_id)
                                ->value('value_point') * Setting::value('setting_value_exam_point'))) / 100;
                        $value[] = (int) ValueSemester::where('student_id', $student->student_id)
                            ->where('subject_id', $subject->subject_id)
                            ->average('value_point_pg');
                    }
                    $data[] = array_merge([$student->student_name], $value);
                }
                $msg['data'] = empty($data) ? [] : $data;
            }
            elseif ($request->_type == 'data' && $request->_data == 'upload'){
                $validator = Validator::make($request->all(), [
                    'value_exam' => 'mimes:xls,xlsx'
                ]);
                if ($validator->fails()) {
                    $msg = ['title' => 'Kesalahan !', 'class' => 'danger', 'text' => 'Berkas Harus Berekstensi xls/xlsx'];
                }
                else {
                    if ($request->hasFile('value_exam')) {
                        $path = $request->file('value_exam')->getRealPath();
                        $msg = ['title' => 'Berhasil !', 'class' => 'success', 'text' => 'Nilai Semester Berhasil ditambahkan'];
                        Excel::import(new ValueExamImport, $path);
                    }
                }
            }
            return response()->json($msg);
        }
        elseif ($request->_type == 'download' && $request->_data == 'value_exam'){
            return Excel::download(new ValueSemesterExport, 'nilai_ujian.xlsx');
        }
        else {
            return view('graduate.admin.value_ijazah');
        }
    }

    public function setting(Request $request)
    {
        if ($request->isMethod('post')){
            if ($request->_type == 'update'){
                $subject = Setting::first();
                if ($subject->update([
                    'setting_value_semester_point' => $request->setting_value_semester_point,
                    'setting_value_exam_point' => $request->setting_value_exam_point
                    ])){
                    $msg = ['title' => 'Sukses !', 'class' => 'success', 'text' => 'Pengaturan Penilaian berhasil diperbarui.'];
                }
                else {
                    $msg = ['title' => 'Gagal !', 'class' => 'danger', 'text' => 'Pengaturan Penilaian gagal diperbarui.'];
                }
            }
            return response()->json($msg);
        }
        else {
            return view('graduate.admin.value_setting');
        }
    }
}
