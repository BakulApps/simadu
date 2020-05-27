<!DOCTYPE html>
<html lang="id">
    <head>
        <style>
            @page {
                size: 21cm 33cm;
                margin: 1cm 1.5cm 0 1.5cm;
            }
        </style>
    </head>
    <body>
    <table style="padding-top: -30px; padding-bottom: -10px;">
        <tr>
            <td style="width: 15%"><img src="{{asset('storage/sites/admission/images/logo_school.png')}}" width="110" height="105" alt=""></td>
            <td>
                <p style="text-align: center">
                <span style="font-size: 24px; font-weight: bold;">
                    {{strtoupper(\App\Models\Master\Ladder::where("ladder_id", \App\Models\Admission\Setting::value("setting_school_ladder"))->value("ladder_name"))}}
                </span><br>
                    <span style="font-size: 28px; font-weight: bold">{{strtoupper(\App\Models\Admission\Setting::value("setting_school_name"))}}</span><br>
                    <span style="font-size: 18px; font-weight: bold;"><i>"{{\App\Models\Admission\Setting::value("setting_school_slug")}}"</i></span><br>
                    <span style="font-size: 12px">
                    Alamat: {{\App\Models\Admission\Setting::value("setting_school_address")}},
                    Telp : {{\App\Models\Admission\Setting::value("setting_school_phone")}},
                    Email : {{\App\Models\Admission\Setting::value("setting_school_email")}},<br>
                    Website : {{\App\Models\Admission\Setting::value("setting_school_website")}},
                    Kodepos : {{\App\Models\Admission\Setting::value("setting_school_zipos")}}
                </span>
                </p>
            </td>
        </tr>
    </table>
    <div style="border-top: 3px solid black;"></div>
    <p style="text-align: center; font-size: 16px; padding-top: 20px">
        <span style="font-weight: bold">FORMULIR PENDAFTARAN</span><br>
    </p>
    <div class="table-responsive">
        <table class="table table-bordered table-sm">
            <tr>
                <td colspan="4" class="font-weight-bold">I. INFORMASI PRIBADI</td>
            </tr>
            <tr>
                <td class="text-right" style="width: 1%;">1. </td>
                <td style="width: 20%">Nama Lengkap</td>
                <td class="text-center" style="width: 1%;">:</td>
                <td>{{$student->student_name}}</td>
            </tr>
            <tr>
                <td class="text-right" style="width: 1%;">2. </td>
                <td>Nomo Induk Siswa Nasional</td>
                <td class="text-center" style="width: 1%;">:</td>
                <td>{{$student->student_nisn}}</td>
            </tr>
            <tr>
                <td class="text-right" style="width: 5%">3. </td>
                <td>Nomo Induk Kependudukan</td>
                <td class="text-right" style="width: 5%">:</td>
                <td>{{$student->student_nik}}</td>
            </tr>
            <tr>
                <td class="text-right" style="width: 5%">4. </td>
                <td>Tempat, Tanggal Lahir</td>
                <td class="text-right" style="width: 5%">:</td>
                <td>{{$student->student_place_birth}}, {{\Carbon\Carbon::parse($student->student_birthday)->formatLocalized('%d %B %Y')}}</td>
            </tr>
            <tr>
                <td class="text-right" style="width: 5%">5. </td>
                <td>Jenis Kelamin</td>
                <td class="text-right" style="width: 5%">:</td>
                <td>{{$student->student_gender == "L" ? "Laki - Laki" : "Perempuan"}}</td>
            </tr>
            <tr>
                <td class="text-right" style="width: 5%">6. </td>
                <td>Agama</td>
                <td class="text-right" style="width: 5%">:</td>
                <td>{{$religion[$student->student_religion]}}</td>
            </tr>
            <tr>
                <td class="text-right" style="width: 5%">7. </td>
                <td>Alamat</td>
                <td class="text-right" style="width: 5%">:</td>
                <td>{{$student->student_address}}</td>
            </tr>
            <tr>
                <td class="text-right" style="width: 5%">8. </td>
                <td>Anak Ke</td>
                <td class="text-right" style="width: 5%">:</td>
                <td>{{$student->student_place_sibling}}</td>
            </tr>
            <tr>
                <td class="text-right" style="width: 5%">9. </td>
                <td>Jumlah Saudara</td>
                <td class="text-right" style="width: 5%">:</td>
                <td>{{$student->student_sibling}}</td>
            </tr>
        </table>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-sm">
            <tr>
                <td colspan="10" class="text-left font-weight-bold">II. INFORMASI ORANGTUA/WALI</td>
            </tr>
            <tr>
                <td class="text-right" style="width: 1%">1. </td>
                <td>Nomor Kartu Keluarga</td>
                <td class="text-center" style="width: 1%">:</td>
                <td colspan="6" style="text-align: left; ">{{$student->student_no_kk}}</td>
            </tr>
            <tr>
                <td class="text-right" style="width: 1%">2. </td>
                <td style="width: 20%">Nama</td>
                <td class="text-right" style="width: 1%">:</td>
                <td style="width: 5%">Ayah</td>
                <td class="text-center" style="width: 1%">:</td>
                <td>{{$student->student_father_name}}</td>
                <td style="width: 5%">Ibu</td>
                <td class="text-center" style="width: 1%;">:</td>
                <td>{{$student->student_mother_name}}</td>
            </tr>
            <tr>
                <td class="text-right">3. </td>
                <td>Nomor Induk Kependudukan</td>
                <td class="text-center">:</td>
                <td>Ayah</td>
                <td class="text-center">:</td>
                <td>{{$student->student_father_nik}}</td>
                <td>Ibu</td>
                <td class="text-center">:</td>
                <td>{{$student->student_mother_nik}}</td>
            </tr>
            <tr>
                <td class="text-right">4. </td>
                <td>Agama</td>
                <td class="text-center">:</td>
                <td>Ayah</td>
                <td class="text-center">:</td>
                <td>{{$religion[$student->student_father_religion]}}</td>
                <td>Ibu</td>
                <td class="text-center">:</td>
                <td>{{$religion[$student->student_mother_religion]}}</td>
            </tr>
            <tr>
                <td class="text-right">5. </td>
                <td>Pendidikan</td>
                <td class="text-center">:</td>
                <td>Ayah</td>
                <td class="text-center">:</td>
                <td>{{$study[$student->student_father_study]}}</td>
                <td>Ibu</td>
                <td class="text-center">:</td>
                <td>{{$study[$student->student_mother_study]}}</td>
            </tr>
            <tr>
                <td class="text-right">6. </td>
                <td>Pekerjaan</td>
                <td class="text-center">:</td>
                <td>Ayah</td>
                <td class="text-center">:</td>
                <td>{{$job[$student->student_father_job]}}</td>
                <td>Ibu</td>
                <td class="text-center">:</td>
                <td>{{$job[$student->student_mother_job]}}</td>
            </tr>
            <tr>
                <td class="text-right">7. </td>
                <td>Penghasilan Orangtua/Wali</td>
                <td class="text-center">:</td>
                <td colspan="6">{{$value[$student->student_parent_value]}}</td>
            </tr>
            <tr>
                <td class="text-right">8. </td>
                <td>Nomor HP Orangtua/Wali</td>
                <td class="text-center">:</td>
                <td colspan="6">{{$student->student_phone}}</td>
            </tr>
        </table>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-sm">
            <tr>
                <td colspan="5" class="font-weight-bold">III. INFORMASI SEKOLAH ASAL</td>
            </tr>
            <tr>
                <td class="text-right" style="width: 1%">1. </td>
                <td style="width: 25%">Nama Sekolah</td>
                <td class="text-center" style="width: 1%;">:</td>
                <td>{{$student->student_from_school}}</td>
            </tr>
            <tr>
                <td class="text-right">2. </td>
                <td>Nomor Pokok Sekolah Nasional</td>
                <td class="text-center">:</td>
                <td>{{$student->student_from_school_npsn}}</td>
            </tr>
        </table>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-sm">
            <tr>
                <td colspan="5" class="font-weight-bold">IV. BERKAS PERSYARATAN</td>
            </tr>
            <tr>
                <td style="width: 1%">1. </td>
                <td style="text-align: left; width: 20%">STTB</td>
                <td style="text-align: center; width: 1%">:</td>
                <td style="text-align: left; "><input type="checkbox" {{$student->student_sttb_file != null ? 'checked' : null}}></td>
            </tr>
            <tr>
                <td>2. </td>
                <td style="text-align: left; ">SKHUN</td>
                <td style="text-align: center; ">:</td>
                <td style="text-align: left; "><input type="checkbox" {{$student->student_skhun_file != null ? 'checked' : null}}></td>
            </tr>
            <tr>
                <td>3. </td>
                <td style="text-align: left; ">Foto</td>
                <td style="text-align: center; ">:</td>
                <td style="text-align: left; "><input type="checkbox" {{$student->student_photo_file != null ? 'checked' : null}}></td>
            </tr>
            <tr>
                <td>4. </td>
                <td style="text-align: left; ">Akte Kelahiran</td>
                <td style="text-align: center; ">:</td>
                <td style="text-align: left; "><input type="checkbox" {{$student->student_akte_file != null ? 'checked' : null}}></td>
            </tr>
            <tr>
                <td>5. </td>
                <td style="text-align: left; ">Kartu PKH/KIP/PIP</td>
                <td style="text-align: center; ">:</td>
                <td style="text-align: left; "><input type="checkbox" {{$student->student_pip_file != null ? 'checked' : null}}></td>
            </tr>
        </table>
    </div>
    <div class="table-responsive">
        <table class="table table-sm" style="width: 100%">
            <tr>
                <td style="width: 65%;">&nbsp;</td>
                <td>Jepara, {{\Carbon\Carbon::parse($student->created_at)->formatLocalized('%d %B %Y')}}</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>Pendaftar<br><br><br><br>{{$student->student_name}}</td>
            </tr>
        </table>
    </div>
    </body>
</html>
