<?php

namespace App\Http\Controllers\Admission;

use App\Models\Admission\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class MainController extends Controller
{
    public function index()
    {
        return view('admission.index');
    }

    public function register(Request $request)
    {
        if ($request->submit == 'store'){
            if ($request->student_nisn == null){
                $request->student_nisn = strtoupper(str_random(10));
                $msg = ['title' => 'Berhasil !', 'class' => 'success', 'text' => 'Pendaftaran Berhasil, segera lengkapi persyaratan dimenu Unggah Persyaratan. Kode Pendaftaran anda adalah : ' . $request->student_nisn, ' silahkan simpan Kode Pendaftaran tersebut'];
            }
            else {
                $msg = ['title' => 'Berhasil !', 'class' => 'success', 'text' => 'Pendaftaran Berhasil, segera lengkapi persyaratan dimenu Unggah Persyaratan'];
            }
            $student =  new Student();
            $student->student_name = $request->student_name;
            $student->student_nisn = $request->student_nisn;
            $student->student_nik = $request->student_nik;
            $student->student_place_birth = $request->student_place_birth;
            $student->student_birthday = Carbon::createFromFormat('d/m/Y', $request->student_birthday)->format('Y-m-d');
            $student->student_gender = $request->student_gender;
            $student->student_religion = $request->student_religion;
            $student->student_address = $request->student_address;
            $student->student_place_sibling = $request->student_place_sibling;
            $student->student_sibling = $request->student_sibling;
            $student->student_achievement = $request->student_achievement;
            $student->student_father_name = $request->student_father_name;
            $student->student_father_nik = $request->student_father_nik;
            $student->student_father_religion = $request->student_father_religion;
            $student->student_father_job = $request->student_father_job;
            $student->student_father_study = $request->student_father_study;
            $student->student_mother_name = $request->student_mother_name;
            $student->student_mother_nik = $request->student_mother_nik;
            $student->student_mother_religion = $request->student_mother_religion;
            $student->student_mother_job = $request->student_mother_job;
            $student->student_mother_study = $request->student_mother_study;
            $student->student_parent_value = $request->student_parent_value;
            $student->student_no_kk = $request->student_no_kk;
            $student->student_phone = $request->student_phone;
            $student->student_from_school = $request->student_from_school;
            $student->student_from_school_npsn = $request->student_from_school_npsn;
            $student->student_no_ijazah = $request->student_no_ijazah;
            $student->student_no_skhun = $request->student_no_skhun;
            $student->student_value_exam = $request->student_value_exam;
            $student->student_status = 1;
            return $student->save() ? back()->withInput()->with('msg', $msg) : back()->with('msg', ['title' => 'Gagal !', 'class' => 'danger', 'text' => 'Pendaftaran Gagal, Silahkan periksa data yang di masukkan.']);
        }
        else {
            return view('admission.register');
        }
    }

    public function upload(Request $request)
    {
        if ($request->submit == 'search'){
            $student = Student::where('student_nisn', $request->student_nisn);
            if ($student->count() > 0){
                $student = $student->get();
                $request->session()->put('student', $student[0]);
                return view('admission.upload', ['student' => $student[0]]);
            }
            else{
                return back()->with('msg', ['title' => 'Kesalahan !', 'class' => 'danger', 'text' => 'Data tidak ditemukan, periksa kembali NISN/Kode Pendaftaran anda.']);
            }
        }
        elseif ($request->submit == 'upload'){
            $validator = Validator::make($request->all(), [
                'student_sttb_file' => 'max:512|mimes:jpg,jpeg',
                'student_skhun_file' => 'max:512|mimes:jpg,jpeg',
                'student_photo_file' => 'max:512|mimes:jpg,jpeg',
                'student_akta_file' => 'max:512|mimes:jpg,jpeg',
                'student_kk_file' => 'max:512|mimes:jpg,jpeg',
                'student_pip_file' => 'max:512|mimes:jpg,jpeg',
            ]);
            if($validator->fails()){
                return  back()->with('msg', ['title' => 'Kesalahan !', 'class' => 'danger', 'text' => 'Berkas Harus Berekstensi jpg/jpeg dan Ukuran maksimal 512Kb']);
            }
            else {
                $pathupload = storage_path() . '/app/public/sites/admission/images/students';
                $student_sttb_file = $request->file('student_sttb_file');
                $student_skhun_file = $request->file('student_skhun_file');
                $student_photo_file = $request->file('student_photo_file');
                $student_akta_file = $request->file('student_akta_file');
                $student_kk_file = $request->file('student_kk_file');
                $student_pip_file = $request->file('student_pip_file');
                $request->hasFile('student_sttb_file') ? $student_sttb_file->move($pathupload, $student_sttb_name = $request->student_nisn . "_sttb." . $student_sttb_file->extension()) : $student_sttb_name = null;
                $request->hasFile('student_skhun_file') ? $student_skhun_file->move($pathupload, $student_skhun_name = $request->student_nisn . "_skhun." . $student_skhun_file->extension()) : $student_skhun_name = null;
                $request->hasFile('student_photo_file') ? $student_photo_file->move($pathupload, $student_photo_name = $request->student_nisn . "_photo." . $student_photo_file->extension()) : $student_photo_name = null;
                $request->hasFile('student_akta_file') ? $student_akta_file->move($pathupload, $student_akta_name = $request->student_nisn . "_akta." . $student_akta_file->extension()) : $student_akta_name = null;
                $request->hasFile('student_kk_file') ? $student_kk_file->move($pathupload, $student_kk_name = $request->student_nisn . "_kk." . $student_kk_file->extension()) : $student_kk_name = null;
                $request->hasFile('student_pip_file') ? $student_pip_file->move($pathupload, $student_pip_name = $request->student_nisn . "_pip." . $student_pip_file->extension()) : $student_pip_name = null;

                $student = Student::where('student_nisn', $request->student_nisn);
                $student->update([
                    'student_sttb_file' => url('') .'/storage/sites/admission/images/students/'. $student_sttb_name,
                    'student_skhun_file' => url('') .'/storage/sites/admission/images/students/'. $student_skhun_name,
                    'student_photo_file' => url('') .'/storage/sites/admission/images/students/'. $student_photo_name,
                    'student_akta_file' => url('') .'/storage/sites/admission/images/students/'. $student_akta_name,
                    'student_kk_file' => url('') .'/storage/sites/admission/images/students/'. $student_kk_name,
                    'student_pip_file' => url('') .'/storage/sites/admission/images/students/'. $student_pip_name
                ]);
                return back()->with('msg', ['title' => 'Selamat !', 'class' => 'success', 'text' => $student->value('student_name') . ' Berkas persyaratanmu telah di unggah, silahkan cetak bukti pendaftaran dimenu cetak']);
            }
        }
        else {
            return view('admission.upload');
        }
    }

    public function notice(Request $request)
    {
        if ($request->submit == 'search'){
            $student = Student::where('student_nisn', $request->student_nisn);
            if ($student->count() > 0){
                $student = $student->get();
                return view('admission.notice', ['student' => $student[0]]);
            }
            else{
                return back()->with('msg', ['title' => 'Kesalahan !', 'class' => 'danger', 'text' => 'Data tidak ditemuka, periksa kembali NISN anda.']);
            }
        }
        else {
            return view('admission.notice');
        }
    }

    public function print(Request $request)
    {
        if ($request->submit == 'search'){
            $student = Student::where('student_nisn', $request->student_nisn);
            if ($student->count() > 0){
                $student = $student->get();
                $religion = ['', 'Islam', 'Kristen Protestan', 'Katolik', 'Hindu', 'Buddha', 'Kong Hu Chu'];
                $study      = ['', 'Tidak Berpendidikan', 'SD/Sederajat', 'SMP/Sederajat', 'SMA/Sederajat', 'D1', 'D2', 'D3', 'D4/S1', 'S2', 'S3'];
                $job        = ['',
                    'Tidak Berkerja', 'Pensiunan', 'PNS', 'TNI/Polisi', 'Guru/Dosen', 'Pegawai Swasta',
                    'Wiraswasta/Wirausaha', 'Pengacara/Hakim/Jaksa/Notaris', 'Seniman/Pelukis/Artis/Sejenis',
                    'Dokter/Bidan/Perawat', 'Pilot/Pramugara', 'Pedagang', 'Petani/Peternak', 'Nelayan',
                    'Buruh (Tani/Pabrik/Bangunan)', 'Sopir/Masinis/Kondektur', 'Politikus', 'Lainnya'
                ];
                $value      = ['',
                    'Kurang dari Rp 500.000', 'Rp 500.000 - 1.000.000', 'Rp 1.000.001 - 2.000.000',
                    'Rp 2.000.001 - 3.000.000', 'Rp 3.000.001 - 5.000.000', 'Lebih dari Rp 5.000.000'];
                $program    = ['', 'Tahfidz Class', 'Reguler Class'];
                $boarding = ['', 'Boarding School', 'Reguler School'];
                $data = [
                    'religion' => $religion,
                    'study' => $study,
                    'job' => $job,
                    'value' => $value,
                    'program' => $program,
                    'boarding' => $boarding,
                    'student' => $student[0]
                ];
                return view('admission.print', $data);
            }
            else{
                return back()->with('msg', ['title' => 'Kesalahan !', 'class' => 'danger', 'text' => 'Data tidak ditemuka, periksa kembali NISN anda.']);
            }
        }
        elseif ($request->submit == 'print'){
            $student = Student::where('student_nisn', $request->student_nisn);
            if ($student->count() > 0){
                $student = $student->get();
                $religion = ['', 'Islam', 'Kristen Protestan', 'Katolik', 'Hindu', 'Buddha', 'Kong Hu Chu'];
                $study      = ['', 'Tidak Berpendidikan', 'SD/Sederajat', 'SMP/Sederajat', 'SMA/Sederajat', 'D1', 'D2', 'D3', 'D4/S1', 'S2', 'S3'];
                $job        = ['',
                    'Tidak Berkerja', 'Pensiunan', 'PNS', 'TNI/Polisi', 'Guru/Dosen', 'Pegawai Swasta',
                    'Wiraswasta/Wirausaha', 'Pengacara/Hakim/Jaksa/Notaris', 'Seniman/Pelukis/Artis/Sejenis',
                    'Dokter/Bidan/Perawat', 'Pilot/Pramugara', 'Pedagang', 'Petani/Peternak', 'Nelayan',
                    'Buruh (Tani/Pabrik/Bangunan)', 'Sopir/Masinis/Kondektur', 'Politikus', 'Lainnya'
                ];
                $value      = ['',
                    'Kurang dari Rp 500.000', 'Rp 500.000 - 1.000.000', 'Rp 1.000.001 - 2.000.000',
                    'Rp 2.000.001 - 3.000.000', 'Rp 3.000.001 - 5.000.000', 'Lebih dari Rp 5.000.000'];
                $program    = ['', 'Tahfidz Class', 'Regules Class'];
                $boarding   = ['', 'Boarding School', 'Regular School'];
                $data = [
                    'student' => $student[0],
                    'religion' => $religion,
                    'study' => $study,
                    'job' => $job,
                    'value' => $value,
                    'program' => $program,
                    'boarding' => $boarding
                ];
                return \PDF::loadView('admission.form_template', $data)->download('formulir'.$request->student_nisn .'.pdf');
            }
        }
        else {
            return view('admission.print');
        }
    }
}
