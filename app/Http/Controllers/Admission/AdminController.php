<?php

namespace App\Http\Controllers\Admission;

use App\Exports\Admission\StudentExport;
use App\Models\Admission\Setting;
use App\Models\Admission\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
    public function index()
    {
        return view('admission.admin.index');
    }

    public function student(Request $request)
    {
        if ($request->isMethod('post')){
            if ($request->_type == 'data' && $request->_data == 'student'){
                $no = 1;
                foreach (Student::all() as $student){
                    $data[] = [
                        $no++,
                        $student->student_name,
                        $student->student_nisn,
                        $student->student_place_birth . ', ' . Carbon::parse($student->student_birtday)->formatLocalized('%d %B %Y'),
                        $student->student_gender,
                        $student->student_address,
                        $student->student_father_name,
                        $student->student_program == 1 ? 'Tahfidz Class' : 'Reguler Class',
                        $student->student_status == 1 ? '<span class="badge badge-success">diterima</span>' : '<span class="badge badge-danger">ditolak</span>',
                        '<div class="btn-group">
                        <button class="btn btn-outline-primary bt-sm btn-accept" data-num="'.$student->student_id.'"><i class="icon-checkmark2"></i></button>
                        <button class="btn btn-outline-primary bt-sm btn-reject" data-num="'.$student->student_id.'"><i class="icon-minus3"></i></button>
                        <button class="btn btn-outline-primary bt-sm btn-view" data-num="'.$student->student_id.'"><i class="icon-eye"></i></button>
                        <button class="btn btn-outline-primary bt-sm btn-delete" data-num="'.$student->student_id.'"><i class="icon-trash"></i></button>
                     </div>
                     '
                    ];
                }
                $msg = ['data' => empty($data) ? [] : $data];
            }
            elseif ($request->_type == 'data' && $request->_data == 'modal'){
                $msg = Student::where('student_id', $request->student_id)->get();
                return json_encode($msg[0]);
            }
            elseif ($request->_type == 'submit' && $request->_data == 'accept'){
                $student = Student::find($request->student_id);
                $student->update(['student_status' => 1]);
                $msg = ['class' => 'success', 'title' => 'Berhasil!', 'text' => 'Data Pendaftar berhasil diubah.'];
            }
            elseif ($request->_type == 'submit' && $request->_data == 'reject'){
                $student = Student::find($request->student_id);
                $student->update(['student_status' => 2]);
                $msg = ['class' => 'success', 'title' => 'Berhasil!', 'text' => 'Data Pendaftar berhasil diubah.'];
            }
            elseif ($request->_type == 'submit' && $request->_data == 'delete'){
                Student::find($request->student_id)->delete();
                $msg = ['class' => 'success', 'title' => 'Berhasil!', 'text' => 'Data Pendaftar berhasil dihapus.'];
            }
            return response()->json($msg);
        }
        elseif ($request->_type == 'submit' && $request->_data == 'export'){
            return Excel::download(new StudentExport, 'data_siswa.xls');
        }
        else {
            return view('admission.admin.student');
        }
    }

    public function upload(Request $request)
    {
        return view('admission.admin.upload');
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
            elseif ($request->update == 'app'){
                $setting = Setting::first();
                $setting->update([
                    'setting_app_name' => $request->setting_app_name,
                    'setting_app_subname' => $request->setting_app_subname,
                    'setting_app_notify' => Carbon::createFromFormat('d/m/Y H:i a', $request->setting_app_notify)->format('Y-m-d H:i'),
                ]);
                $msg = ['app' => 'Data Aplikasi berhasil diperbarui.'];
            }
            elseif ($request->update == 'user'){
                auth('admission')->user()->update([
                    'user_name' => empty($request->user_name) ? auth('admission')->user()->user_name : $request->user_name,
                    'user_pass' => bcrypt($request->user_pass),
                    'user_fullname' => $request->user_fullname
                ]);
                $msg = ['user' => 'Data Pengguna berhasil diperbarui.'];
            }
            elseif ($request->update == 'database'){
                if ($request->database_id == 1){
                    Student::query()->truncate();
                }
                $msg = ['database' => 'Database Pendaftaran berhasil dikosongkan.'];
            }
            elseif ($request->submit == 'upload'){
                $logo_school = $request->file('logo_school');
                $pathupload = storage_path('app/public/sites/admission/images/');
                $logo_school->move($pathupload, 'logo_school.png');
                $msg = ['logo' => 'Berkas logo berhasil di unggah, silahkan clear cache browser untuk melihat perubahan.'];

            }
            return redirect()->route('admission.admin.setting')->with('msg', $msg);
        }
        else {
            $data = ['setting' => Setting::first()];
            return view('admission.admin.setting', $data);
        }
    }

}
