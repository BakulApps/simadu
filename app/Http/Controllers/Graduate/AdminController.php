<?php

namespace App\Http\Controllers\Graduate;

use App\Exports\Graduate\StudentExport;
use App\Http\Controllers\Controller;
use App\Imports\Graduate\StudentImport;
use App\Models\Graduate\Master\Subject;
use App\Models\Graduate\Master\Year;
use App\Models\Graduate\Notify;
use App\Models\Graduate\Setting;
use App\Models\Graduate\Student;
use App\Models\Graduate\ValueExam;
use App\Models\Graduate\ValueSemester;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class AdminController extends Controller
{
    public function index()
    {
        return view('graduate.admin.index');
    }

    public function student(Request $request)
    {
        if ($request->isMethod('post')) {
            if ($request->_type == 'data' && $request->_data == 'all'){
                $no = 1;
                foreach (Student::OrderBy('student_class')->OrderBy('student_name')->get() as $student){
                    $data[] = [
                        $no++,
                        $student->student_name,
                        $student->student_nisn,
                        $student->student_nism,
                        $student->student_class,
                        $student->student_place_birth . ', ' . Carbon::createFromFormat('Y-m-d', $student->student_birthday)->formatLocalized('%d %B %Y'),
                        $student->student_gender,
                        $student->student_parent,
                        '<div class="btn-group">
                            <button class="btn btn-outline-primary bt-sm btn-edit" data-num="'.$student->student_id.'"><i class="icon-pencil"></i></button>
                            <button class="btn btn-outline-primary bt-sm btn-delete" data-num="'.$student->student_id.'"><i class="icon-trash"></i></button>
                        </div>
                     '
                    ];
                }
                $msg = ['data' => empty($data) ? [] : $data];
            }
            elseif ($request->_type == 'data' && $request->_data == 'upload'){
                $validator = Validator::make($request->all(), [
                    'data_student' => 'mimes:xls,xlsx'
                ]);
                if ($validator->fails()) {
                    $msg = ['title' => 'Kesalahan !', 'class' => 'danger', 'text' => 'Berkas Harus Berekstensi xls/xlsx'];
                }
                else {
                    if ($request->hasFile('data_student')) {
                        $file = $request->file('data_student')->store('temp');
                        $path = storage_path('app') .'/'. $file;
                        Student::query()->truncate();
                        if (Excel::import(new StudentImport, $path)) {
                            $msg = ['title' => 'Berhasil !', 'class' => 'success', 'text' => 'Data Siswa Berhasil ditambahkan'];
                        } else {
                            $msg = ['title' => 'Kesalahan !', 'class' => 'danger', 'text' => 'Data Siswa Gagal di simpan, periksa kembali berkas anda'];
                        }
                    }
                }
            }
            elseif ($request->_type == 'data' && $request->_data == 'student'){
                $student = Student::where('student_id', $request->student_id)->first();
                $msg = $student;
            }
            elseif ($request->_type == 'delete'){
                $student = Student::where('student_id', $request->student_id)->first();
                if ($student->delete()){
                    $msg = ['title' => 'Sukses !', 'class' => 'success', 'text' => 'Data Siswa berhasil dihapus.'];
                }
                else {
                    $msg = ['title' => 'Gagal !', 'class' => 'danger', 'text' => 'Data Siswa gagal dihapus.'];
                }
            }
            elseif ($request->_type == 'update'){
                $student = Student::where(['student_id' => $request->student_id]);
                if ($student->update([
                    'student_name' => $request->student_name,
                    'student_nisn' => $request->student_nisn,
                    'student_nism' => $request->student_nism,
                    'student_class' => $request->student_class,
                    'student_place_birth' => $request->student_place_birth,
                    'student_birthday' => $request->student_birthday,
                    'student_gender' => $request->student_gender,
                    'student_address' => $request->student_address,
                    'student_parent' => $request->student_parent])){
                    $msg = ['title' => 'Sukses !', 'class' => 'success', 'text' => 'Data Siswa berhasil diperbarui.'];
                }
                else {
                    $msg = ['title' => 'Gagal !', 'class' => 'danger', 'text' => 'Data Siswa gagal diperbarui.'];
                }
            }
            return response()->json($msg);
        }
        elseif ($request->_type == 'download' && $request->_data == 'student'){
            return Excel::download(new StudentExport, 'data_siswa.xlsx');
        }
        else {
            return view('graduate.admin.student');
        }
    }

    public function notify(Request $request)
    {
        if ($request->isMethod('post')){
            if ($request->_type == 'data' && $request->_data == 'all'){
                $no = 1;
                foreach (Notify::join('entity__students', 'entity__students.student_id', '=', 'entity__notifies.student_id')
                             ->OrderBy('student_class')->OrderBy('student_name')->get() as $notify){
                    $data[] = [
                        $no++,
                        $notify->student_name,
                        $notify->notify_status == 1 ? '<span class="badge badge-success">lulus</span>' : '<span class="badge badge-danger">tidak lulus</span>',
                        $notify->notify_value_total,
                        $notify->notify_id,
                        $notify->notify_view,
                        $notify->notify_print,
                        '<div class="btn-group">
                            <button class="btn btn-outline-primary bt-sm btn-view" data-num="'.$notify->notify_id.'"><i class="icon-eye"></i></button>
                            <button class="btn btn-outline-primary bt-sm btn-edit" data-num="'.$notify->notify_id.'"><i class="icon-pencil"></i></button>
                        </div>
                     '
                    ];
                }
                $msg = ['data' => empty($data) ? [] : $data];
            }
            elseif ($request->_type == 'data' && $request->_data == 'notify'){
                $notify = Notify::where('notify_id', $request->notify_id)
                    ->join('entity__students', 'entity__students.student_id', '=', 'entity__notifies.student_id')->first();
                $msg = $notify;
            }
            elseif ($request->_type == 'update'){
                $notify = Notify::where(['notify_id' => $request->notify_id]);
                if ($notify->update([
                    'notify_status' => $request->notify_status])){
                    $msg = ['title' => 'Sukses !', 'class' => 'success', 'text' => 'Data Kelulusan berhasil diperbarui.'];
                }
                else {
                    $msg = ['title' => 'Gagal !', 'class' => 'danger', 'text' => 'Data Kelulusan gagal diperbarui.'];
                }
            }
            elseif ($request->_type == 'store'){
                $path = storage_path() . 'app/public/sites/graduate/images/qr/*.png';
                $files = glob($path);
                foreach ($files as $file){
                    unlink($file);
                }
                Notify::query()->truncate();
                foreach (Student::OrderBy('student_class')->OrderBy('student_name')->get()  as $student){
                    $value = [];
                    foreach (Subject::OrderBy('subject_number')->get() as $subject){
                        $value = array_merge($value,[
                            ((ValueSemester::where('student_id', $student->student_id)
                                        ->where('subject_id', $subject->subject_id)
                                        ->average('value_point') * Setting::value('setting_value_semester_point')) +
                                (ValueExam::where('student_id', $student->student_id)
                                        ->where('subject_id', $subject->subject_id)
                                        ->value('value_point') * Setting::value('setting_value_exam_point'))) / 100
                        ]);
                    }
                    $uuid = Factory::create('id_ID')->uuid;
                    Notify::create([
                        'notify_id' => $uuid,
                        'notify_number' => Factory::create('id_ID')->numberBetween(100, 999),
                        'notify_status' => 1,
                        'notify_value' => json_encode($value),
                        'notify_value_total' => array_sum($value),
                        'notity_value_rank' => 0,
                        'notify_view' => 0,
                        'notify_print' => 0,
                        'student_id' => $student->student_id
                    ]);
                    QrCode::size(1024)->format('png')
                        ->generate(route('home.authentication', ['id' => $uuid]), storage_path('app/public/sites/graduate/images/qr/'. $uuid . '.png'));
                }
                $msg = ['title' => 'Sukses !', 'class' => 'success', 'text' => 'Data Kelulusan berhasil dibuat.'];
            }
            return response()->json($msg);
        }
        else {
            return view('graduate.admin.notify');
        }
    }

    public function setting(Request $request)
    {
        if ($request->isMethod('post')){
            if ($request->update == 'school'){
                $setting = Setting::first();
                $setting->update([
                    'setting_school_fundation' => $request->setting_school_fundation,
                    'setting_school_ladder' => $request->setting_school_ladder,
                    'setting_school_name' => $request->setting_school_name,
                    'setting_school_slug' => $request->setting_school_slug,
                    'setting_school_nsm' => $request->setting_school_nsm,
                    'setting_school_npsn' => $request->setting_school_npsn,
                    'setting_school_phone' => $request->setting_school_phone,
                    'setting_school_email' => $request->setting_school_email,
                    'setting_school_website' => $request->setting_school_website,
                    'setting_school_address' => $request->setting_school_address,
                    'setting_school_zipos' => $request->setting_school_zipos,
                    'setting_school_headmaster_name' => $request->setting_school_headmaster_name,
                    'setting_school_headmaster_nip' => $request->setting_school_headmaster_nip,
                ]);
                $msg = ['school' => 'Data Sekolah berhasil diperbarui.'];
            }
            elseif ($request->update == 'notify'){
                $setting = Setting::first();
                $setting->update([
                    'setting_notify_letter' => $request->setting_notify_letter,
                    'setting_notify_header' => $request->setting_notify_header,
                    'setting_notify_footer' => $request->setting_notify_footer,
                    'setting_notify_date' => Carbon::createFromFormat('d/m/Y H:i A', $request->setting_notify_date)->format('Y-m-d H:i:s')
                ]);
                $msg = ['notify' => 'Data Pengumuman berhasil diperbarui.'];
            }
            elseif ($request->update == 'user'){
                auth('graduate')->user()->update([
                    'user_name' => empty($request->user_name) ? auth('graduate')->user()->user_name : $request->user_name,
                    'user_pass' => bcrypt($request->user_pass),
                    'user_fullname' => $request->user_fullname
                ]);
                $msg = ['user' => 'Data Pengguna berhasil diperbarui.'];
            }
            elseif ($request->update == 'database'){
                if ($request->database_id == 1){
                    Year::query()->truncate();
                }
                elseif ($request->database_id == 2){
                    Subject::query()->truncate();
                }
                elseif ($request->database_id == 3){
                    Student::query()->truncate();
                }
                elseif ($request->database_id == 4){
                    ValueSemester::query()->truncate();
                }
                elseif ($request->database_id == 5){
                    ValueExam::query()->truncate();
                }
                elseif ($request->database_id == 6){
                    $path = public_path() . '/assets/sites/graduate/images/qr/*.png';
                    $files = glob($path);
                    foreach ($files as $file){
                        unlink($file);
                    }
                    Notify::query()->truncate();
                }
                $msg = ['database' => 'Basis Data berhasil dihapus.'];
            }
            elseif ($request->submit == 'upload'){
                $logo_school = $request->file('logo_school');
                $pathupload = storage_path('app/public/sites/graduate/images/');
                $logo_school->move($pathupload, 'logo_school.png');
                $msg = ['logo' => 'Berkas logo berhasil di unggah, silahkan clear cache browser untuk melihat perubahan.'];
            }
            return redirect()->route('admin.setting')->with('msg', $msg);
        }
        else {
            $data = ['setting' => Setting::first()];
            return view('graduate.admin.setting', $data);
        }
    }
}
