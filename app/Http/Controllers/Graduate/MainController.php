<?php

namespace App\Http\Controllers\Graduate;

use App\Http\Controllers\Controller;
use App\Models\Graduate\Notify;
use App\Models\Graduate\Setting;
use App\Models\Graduate\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(Request $request)
    {
        if (Setting::value('setting_notify_date') <= Carbon::now()){
            if ($request->submit == 'search'){
                $student = Student::where('student_nisn', $request->student_nisn)
                    ->join('graduate_entity__notifies', 'graduate_entity__notifies.student_id', '=', 'graduate_entity__students.student_id');
                if ($student->count() > 0){
                    $student = $student->first();
                    Notify::where('student_id', $student->student_id)->update([
                        'notify_view' => $student->notify_view + 1
                    ]);
                    $msg = ['student' => $student];
                    return view('graduate.result', $msg);
                }
                else {

                    return redirect()->back()->with('msg', ['title' => 'Kesalahan!', 'class' => 'danger', 'text' => 'NISN tidak ditemukan, silahkan periksa kembali']);
                }
            }
            elseif ($request->submit == 'print'){
                return $this->print($request);
            }
            return view('graduate.index');
        }
        else {
            return view('graduate.coutdown', ['noticeDate' => Carbon::parse(Setting::value('setting_notify_date'))->format('Y-m-d H:i:s')]);
        }
    }

    public function print(Request $request)
    {
        if ($request->submit == 'skl'){
            $student = Student::where('student_nisn', $request->student_nisn)
                ->join('graduate_entity__notifies', 'graduate_entity__notifies.student_id', '=', 'graduate_entity__students.student_id')->first();
            Notify::where('student_id', $student->student_id)->update([
                'notify_print' => $student->notify_print + 1
            ]);
            $value_pg = json_decode($student->notify_value_pg, true);
            $value_kt = json_decode($student->notify_value_kt, true);
            $data = ['student' => $student, 'value_pg' => $value_pg, 'value_kt' => $value_kt];
            return \PDF::loadView('graduate.skl_template', $data)->download('SKL-'.$student->student_nisn.'.pdf');
        }
        elseif ($request->submit == 'skl_un'){
            $student = Student::where('student_nisn', $request->student_nisn)
                ->join('graduate_entity__notifies', 'graduate_entity__notifies.student_id', '=', 'graduate_entity__students.student_id')
                    ->first();
            $data = ['student' => $student];
            return \PDF::loadView('graduate.skl_un_template', $data)->download('SKL-UN-'.$student->student_nisn.'.pdf');
        }
    }

    public function authentication($id)
    {
        $notify = Notify::where('notify_id', $id)
            ->join('graduate_entity__students', 'graduate_entity__students.student_id', '=', 'graduate_entity__notifies.student_id');
        if ($notify->count() > 0){
            $data = ['notify' => $notify->first()];
        }
        else {
            $notify = (object) [
                'notify_id' => null,
                'notify_number' => null,
                'notify_value_pg_total' => null,
                'notify_value_kt_total' => null,
                'notify_view' => null,
                'notify_print' => null,
                'student_id' => null,
                'student_name' => null,
                'student_nisn' => null,
                'student_nism' => null,
                'student_place_birth' => null,
                'student_birthday' => '1999-01-01',
                'student_gender' => null,
                'student_parent' => null,

            ];
            $data = ['notify' => $notify];
        }
        $data['gender'] = ['L' => 'Laki-laki', 'P' => 'Perempuan'];
        return view('graduate.authentication', $data);
    }

    public function test()
    {
        $student = Student::join('graduate_entity__notifies', 'graduate_entity__notifies.student_id', '=', 'graduate_entity__students.student_id')
            ->first();
        $data = ['student' => $student];
        return view('graduate.skl_un_template', $data);
    }
}
