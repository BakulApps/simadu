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
        <td style="width: 15%"><img src="{{asset('storage/sites/graduate/images/logo_school.png')}}" width="110" height="105" alt=""></td>
        <td>
            <p style="text-align: center">
                <span style="font-size: 24px; font-weight: bold;">
                    {{strtoupper(\App\Models\Master\Ladder::where("ladder_id", \App\Models\Graduate\Setting::value("setting_school_ladder"))->value("ladder_name"))}}
                </span><br>
                <span style="font-size: 24px; font-weight: bold">{{strtoupper(\App\Models\Graduate\Setting::value("setting_school_name"))}}</span><br>
                <span style="font-size: 18px; font-weight: bold;"><i>"{{\App\Models\Graduate\Setting::value("setting_school_slug")}}"</i></span><br>
                <span style="font-size: 12px">
                    Alamat: {{\App\Models\Graduate\Setting::value("setting_school_address")}},
                    Telp : {{\App\Models\Graduate\Setting::value("setting_school_phone")}},
                    Email : {{\App\Models\Graduate\Setting::value("setting_school_email")}},<br>
                    Website : {{\App\Models\Graduate\Setting::value("setting_school_website")}},
                    Kodepos : {{\App\Models\Graduate\Setting::value("setting_school_zipos")}}
                </span>
            </p>
        </td>
    </tr>
</table>
<div style="border-top: 3px solid black;"></div>
<p style="text-align: center; font-size: 16px; padding-top: 15px">
    <span style="font-weight: bold">SURAT KETERANGAN LULUS</span><br>
    <span>NOMOR : {{$student->notify_number}}{{\App\Models\Graduate\Setting::value("setting_notify_letter")}}</span><br>
</p>
<p style="text-align: center; font-size: 16px;">
    <span style="font-weight: bold;">{{strtoupper(\App\Models\Graduate\Setting::FullNameSchool())}}</span><br>
    <span style="font-weight: bold">TAHUN PELAJARAN 2019/2020</span>
</p>
<p style="text-align: justify; font-size: 16px; text-indent: 1.5cm">
    Yang bertanda tangan dibawah ini, Kepala {{\App\Models\Graduate\Setting::FullNameSchool()}},
    menerangkan dengan sesungguhnya bahwa :
</p>
<table style="font-size: 16px; text-indent: 1cm; width: 100%; padding-top: -10px">
    <tr>
        <td style="width: 40%">Nama Lengkap</td>
        <td>: {{$student->student_name}}</td>
    </tr>
    <tr>
        <td>Tempat, Tanggal Lahir</td>
        <td>: {{$student->student_place_birth}}, {{\Carbon\Carbon::parse($student->student_birthday)->formatLocalized('%d %B %Y')}}</td>
    </tr>
    <tr>
        <td>Nama Orangtua</td>
        <td>: {{$student->student_parent}}</td>
    </tr>
    <tr>
        <td>Nomor Induk Siswa Madrasah</td>
        <td>: {{$student->student_nism}}</td>
    </tr>
    <tr>
        <td>Nomor Induk Siswa Nasional</td>
        <td>: {{$student->student_nisn}}</td>
    </tr>
    <tr>
        <td>NPSN Madrasah</td>
        <td>: {{\App\Models\Graduate\Setting::value("setting_school_npsn")}}</h2></td>
    </tr>
</table>
<p style="text-align: justify; font-size: 16px; padding-top: -10px">
    Yang bersangkutan dinyatakan LULUS berdasarkan hasil keputusan Rapat Pleno Kelulusan Dewan Guru
    {{\App\Models\Graduate\Setting::FullNameSchool()}}
    pada hari Kamis, tanggal 4 Juli 2020, dengan nilai sebagai berikut :
</p>
<table style="font-size: 16px; width: 90%; border: 1px solid black; border-collapse: collapse; margin: auto; padding-left: -5px">
    <tr>
        <td rowspan="2" style="border: 1px solid black; border-collapse: collapse; width: 10%; text-align: center; font-weight: bold">NO</td>
        <td rowspan="2" style="border: 1px solid black; border-collapse: collapse; width: 70%; text-align: center; font-weight: bold">MATA PELAJARAN</td>
        <td colspan="2" style="border: 1px solid black; border-collapse: collapse; text-align: center; font-weight: bold">NILAI</td>
    </tr>
    <tr>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center; font-weight: bold">Pengetahuan</td>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center; font-weight: bold">Keterampilan</td>
    </tr>
    @php($no = 1)
    @foreach(\App\Models\Master\Subject::OrderBy("subject_number")->get() as $subject)
        <tr>
            <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">{{$no++}}</td>
            <td style="border: 1px solid black; border-collapse: collapse;"><span style="margin-left: 10px;">{{$subject->subject_name}}</span></td>
            <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">{{number_format($value_pg[$subject->subject_id - 1])}}</td>
            <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">{{number_format($value_kt[$subject->subject_id - 1])}}</td>
        </tr>
    @endforeach
    <tr>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center; font-weight: bold" colspan="2">TOTAL NILAI</td>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center; font-weight: bold">{{array_sum($value_pg)}}</td>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center; font-weight: bold">{{array_sum($value_kt)}}</td>
    </tr>
</table>
<p style="text-align: justify; font-size: 16px; text-indent: 1.5cm">
    Surat Keterangan Lulus ini berlaku sementara sampai
    dengan diterbitkannya ijazah kepada yang bersangkutan,
    untuk menjadikan maklum bagi yang berkepentingan.
</p>
<table style="font-size: 16px; width: 100%; padding-top: -10px">
    <tr>
        <td style="width: 20%;"><p style="font-size: 11px; text-align: center"><img src="{{asset('storage/sites/graduate/images/qr/'. $student->notify_id .'.png')}}" width='130px' style='padding-bottom: -2px; padding-left: -5px'><br><i>Scan untuk cek keaslian</i></p></td>
        <td style="width: 45%">&nbsp;</td>
        <td style="vertical-align: text-top">
            <p>Jepara, 5 Juli 2020<br>
                dicetak oleh sistem<br>an. Kepala {{\App\Models\Graduate\Setting::SubNameSchool()}}</p>
        </td>
    </tr>
</table>
<p style="text-align: justify; font-size: 14px; padding-top: -15px; padding-bottom: -20px">
    <i>dicetak dari : {{route('graduate.home')}} pada tanggal : {{\Carbon\Carbon::now()->formatLocalized('%d %B %Y')}},
        cetakan ke - {{$student->notify_print}}</i>
</p>
</body>
</html>
