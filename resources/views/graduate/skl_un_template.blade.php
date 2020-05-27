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
<p style="text-align: center; font-size: 16px; padding-top: 20px">
    <span style="font-weight: bold">SURAT KETERANGAN</span><br>
    <span>NOMOR : {{$student->notify_number}}{{\App\Models\Graduate\Setting::value("setting_notify_letter")}}</span><br>
</p>
<p style="text-align: justify; font-size: 16px; text-indent: 1.5cm">
    Yang bertanda tangan dibawah ini :
</p>
<table style="font-size: 16px; text-indent: 1cm; width: 100%; padding-top: -10px">
    <tr>
        <td style="width: 40%">Nama </td>
        <td>: {{\App\Models\Graduate\Setting::value('setting_school_headmaster_name')}}</td>
    </tr>
    <tr>
        <td>Jabatan</td>
        <td>: Kepala {{\App\Models\Graduate\Setting::SubNameSchool()}}</td>
    </tr>
    <tr>
        <td>Akreditasi</td>
        <td>: B</td>
    </tr>
</table>
<p style="text-align: justify; font-size: 16px; text-indent: 1.5cm">
    Dengan ini menerangkan bahwa
</p>
<table style="font-size: 16px; text-indent: 1cm; width: 100%;">
    <tr>
        <td style="width: 40%">Nama Lengkap</td>
        <td>: {{$student->student_name}}</td>
    </tr>
    <tr>
        <td>Tempat, Tanggal Lahir</td>
        <td>: {{$student->student_place_birth}}, {{\Carbon\Carbon::parse($student->student_birthday)->formatLocalized('%d %B %Y')}}</td>
    </tr>
    <tr>
        <td>Nomor Induk Siswa Nasional</td>
        <td>: {{$student->student_nisn}}</td>
    </tr>
</table>
<p></p>
@php($value  = new \App\Models\Graduate\ValueSemester())
<table style="font-size: 14px; width: 100%; border: 1px solid black; border-collapse: collapse; margin: auto; padding-left: -5px">
    <tr>
        <td rowspan="4" style="border: 1px solid black; border-collapse: collapse; text-align: center; font-weight: bold">NO</td>
        <td rowspan="4" style="border: 1px solid black; border-collapse: collapse; text-align: center; font-weight: bold">MATA PELAJARAN</td>
        <td colspan="15" style="border: 1px solid black; border-collapse: collapse; text-align: center; font-weight: bold">NILAI RAPORT SEMESTER</td>
        <td rowspan="4" style="border: 1px solid black; border-collapse: collapse; text-align: center; font-weight: bold">JML RATA-RATA SMTR I-V</td>
    </tr>
    <tr>
        <td colspan="15" style="border: 1px solid black; border-collapse: collapse; text-align: center; font-weight: bold">ASPEK KOMPETENSI</td>
    </tr>
    <tr>
        <td colspan="3" style="border: 1px solid black; border-collapse: collapse; text-align: center; font-weight: bold">SMTR I</td>
        <td colspan="3" style="border: 1px solid black; border-collapse: collapse; text-align: center; font-weight: bold">SMTR II</td>
        <td colspan="3" style="border: 1px solid black; border-collapse: collapse; text-align: center; font-weight: bold">SMTR III</td>
        <td colspan="3" style="border: 1px solid black; border-collapse: collapse; text-align: center; font-weight: bold">SMTR IV</td>
        <td colspan="3" style="border: 1px solid black; border-collapse: collapse; text-align: center; font-weight: bold">SMTR V</td>
    </tr>
    <tr>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center; font-weight: bold">A</td>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center; font-weight: bold">B</td>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center; font-weight: bold">JML</td>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center; font-weight: bold">A</td>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center; font-weight: bold">B</td>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center; font-weight: bold">JML</td>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center; font-weight: bold">A</td>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center; font-weight: bold">B</td>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center; font-weight: bold">JML</td>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center; font-weight: bold">A</td>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center; font-weight: bold">B</td>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center; font-weight: bold">JML</td>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center; font-weight: bold">A</td>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center; font-weight: bold">B</td>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center; font-weight: bold">JML</td>
    </tr>
    <tr>
        <td style="border: 1px solid black; border-collapse: collapse; width: 5%;text-align: center; font-weight: bold">1</td>
        <td style="border: 1px solid black; border-collapse: collapse; width: 30%;text-align: center; font-weight: bold">2</td>
        <td style="border: 1px solid black; border-collapse: collapse; width: 5%;text-align: center; font-weight: bold">3</td>
        <td style="border: 1px solid black; border-collapse: collapse; width: 5%;text-align: center; font-weight: bold">4</td>
        <td style="border: 1px solid black; border-collapse: collapse; width: 5%;text-align: center; font-weight: bold">5</td>
        <td style="border: 1px solid black; border-collapse: collapse; width: 5%;text-align: center; font-weight: bold">6</td>
        <td style="border: 1px solid black; border-collapse: collapse; width: 5%;text-align: center; font-weight: bold">7</td>
        <td style="border: 1px solid black; border-collapse: collapse; width: 5%;text-align: center; font-weight: bold">8</td>
        <td style="border: 1px solid black; border-collapse: collapse; width: 5%;text-align: center; font-weight: bold">9</td>
        <td style="border: 1px solid black; border-collapse: collapse; width: 5%;text-align: center; font-weight: bold">10</td>
        <td style="border: 1px solid black; border-collapse: collapse; width: 5%;text-align: center; font-weight: bold">11</td>
        <td style="border: 1px solid black; border-collapse: collapse; width: 5%;text-align: center; font-weight: bold">12</td>
        <td style="border: 1px solid black; border-collapse: collapse; width: 5%;text-align: center; font-weight: bold">13</td>
        <td style="border: 1px solid black; border-collapse: collapse; width: 5%;text-align: center; font-weight: bold">14</td>
        <td style="border: 1px solid black; border-collapse: collapse; width: 5%;text-align: center; font-weight: bold">15</td>
        <td style="border: 1px solid black; border-collapse: collapse; width: 5%;text-align: center; font-weight: bold">16</td>
        <td style="border: 1px solid black; border-collapse: collapse; width: 5%;text-align: center; font-weight: bold">17</td>
        <td style="border: 1px solid black; border-collapse: collapse; width: 15%;text-align: center; font-weight: bold">18</td>
    </tr>
    @php($value->setStudent($student->student_id))
    @php($value->setSubject(9))
    <tr>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">1</td>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: left;">IPA</td>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">{{$value->value_pg(1, 1)}}</td>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">{{$value->value_kt(1, 1)}}</td>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">{{$sum1 = $value->value_pg(1, 1) + $value->value_kt(1, 1)}}</td>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">{{$value->value_pg(2, 1)}}</td>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">{{$value->value_kt(2, 1)}}</td>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">{{$sum2 = $value->value_pg(2, 1) + $value->value_kt(2, 1)}}</td>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">{{$value->value_pg(1, 2)}}</td>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">{{$value->value_kt(1, 2)}}</td>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">{{$sum3 = $value->value_pg(1, 2) + $value->value_kt(1, 2)}}</td>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">{{$value->value_pg(2, 2)}}</td>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">{{$value->value_kt(2, 2)}}</td>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">{{$sum4 = $value->value_pg(2, 2) + $value->value_kt(2, 2)}}</td>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">{{$value->value_pg(1, 3)}}</td>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">{{$value->value_kt(1, 3)}}</td>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">{{$sum5 = $value->value_pg(1, 3) + $value->value_kt(1, 3)}}</td>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">{{($sum1 + $sum2 + $sum3 + $sum4 + $sum5) / 5}}</td>
    </tr>
    @php($value->setSubject(8))
    <tr>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">2</td>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: left;">MATEMATIKA</td>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">{{$value->value_pg(1, 1)}}</td>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">{{$value->value_kt(1, 1)}}</td>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">{{$sum1 = $value->value_pg(1, 1) + $value->value_kt(1, 1)}}</td>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">{{$value->value_pg(2, 1)}}</td>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">{{$value->value_kt(2, 1)}}</td>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">{{$sum2 = $value->value_pg(2, 1) + $value->value_kt(2, 1)}}</td>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">{{$value->value_pg(1, 2)}}</td>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">{{$value->value_kt(1, 2)}}</td>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">{{$sum3 = $value->value_pg(1, 2) + $value->value_kt(1, 2)}}</td>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">{{$value->value_pg(2, 2)}}</td>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">{{$value->value_kt(2, 2)}}</td>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">{{$sum4 = $value->value_pg(2, 2) + $value->value_kt(2, 2)}}</td>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">{{$value->value_pg(1, 3)}}</td>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">{{$value->value_kt(1, 3)}}</td>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">{{$sum5 = $value->value_pg(1, 3) + $value->value_kt(1, 3)}}</td>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">{{($sum1 + $sum2 + $sum3 + $sum4 + $sum5) / 5}}</td>
    </tr>
    @php($value->setSubject(11))
    <tr>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">3</td>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: left;">BAHASA INGGRIS</td>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">{{$value->value_pg(1, 1)}}</td>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">{{$value->value_kt(1, 1)}}</td>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">{{$sum1 = $value->value_pg(1, 1) + $value->value_kt(1, 1)}}</td>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">{{$value->value_pg(2, 1)}}</td>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">{{$value->value_kt(2, 1)}}</td>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">{{$sum2 = $value->value_pg(2, 1) + $value->value_kt(2, 1)}}</td>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">{{$value->value_pg(1, 2)}}</td>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">{{$value->value_kt(1, 2)}}</td>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">{{$sum3 = $value->value_pg(1, 2) + $value->value_kt(1, 2)}}</td>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">{{$value->value_pg(2, 2)}}</td>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">{{$value->value_kt(2, 2)}}</td>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">{{$sum4 = $value->value_pg(2, 2) + $value->value_kt(2, 2)}}</td>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">{{$value->value_pg(1, 3)}}</td>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">{{$value->value_kt(1, 3)}}</td>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">{{$sum5 = $value->value_pg(1, 3) + $value->value_kt(1, 3)}}</td>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">{{($sum1 + $sum2 + $sum3 + $sum4 + $sum5) / 5}}</td>
    </tr>
    @php($value->setSubject(6))
    <tr>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">4</td>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: left;">BAHASA INDONESIA</td>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">{{$value->value_pg(1, 1)}}</td>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">{{$value->value_kt(1, 1)}}</td>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">{{$sum1 = $value->value_pg(1, 1) + $value->value_kt(1, 1)}}</td>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">{{$value->value_pg(2, 1)}}</td>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">{{$value->value_kt(2, 1)}}</td>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">{{$sum2 = $value->value_pg(2, 1) + $value->value_kt(2, 1)}}</td>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">{{$value->value_pg(1, 2)}}</td>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">{{$value->value_kt(1, 2)}}</td>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">{{$sum3 = $value->value_pg(1, 2) + $value->value_kt(1, 2)}}</td>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">{{$value->value_pg(2, 2)}}</td>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">{{$value->value_kt(2, 2)}}</td>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">{{$sum4 = $value->value_pg(2, 2) + $value->value_kt(2, 2)}}</td>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">{{$value->value_pg(1, 3)}}</td>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">{{$value->value_kt(1, 3)}}</td>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">{{$sum5 = $value->value_pg(1, 3) + $value->value_kt(1, 3)}}</td>
        <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">{{($sum1 + $sum2 + $sum3 + $sum4 + $sum5) / 5}}</td>
    </tr>
</table>
<p></p>
<table style="font-size: 16px; width: 90%; margin: auto; padding-left: -5px">
    <tr>
        <td>A</td>
        <td>: Kompetensi Pengetahuan</td>
    </tr>
    <tr>
        <td>B</td>
        <td>: Kompetensi Keterampilan</td>
    </tr>
</table>
<p style="text-align: justify; font-size: 16px; text-indent: 1.5cm">
    Demikian surat keterangan ini untuk dapat dipergunakan sebagaimana mestinya,
    dan kepada yang berkepentingan untuk menjadikan maklum.
</p>
<table style="font-size: 16px; width: 100%; padding-top: -10px">
    <tr>
        <td style="width: 20%;"><p style="font-size: 11px; text-align: center"><img src="{{asset('storage/sites/graduate/images/qr/'. $student->notify_id .'.png')}}" width='130px' style='padding-bottom: -2px; padding-left: -5px'><br><i>Scan untuk cek keaslian</i></p></td>
        <td style="width: 45%">&nbsp;</td>
        <td style="vertical-align: text-top">
            <p>Jepara, 2 Juni 2020<br>
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
