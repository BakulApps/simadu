@extends('graduate.layouts.master')
@section('content')
    <div class="col-md-5">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <div class="card-img-actions d-inline-block mb-2">
                        <img src="{{asset('storage/sites/graduate/images/logo_school.png')}}" width="100" height="100" alt="">
                    </div>
                </div>
                <div class="text-center mb-0">
                    <h6 class="font-weight-bold mb-0">PENGUMUMAN KELULUSAN</h6>
                    <span class="d-block text-muted mb-3">{{\App\Models\Graduate\Setting::SubNameSchool()}}</span>
                    <p>Kepala {{\App\Models\Graduate\Setting::FullNameSchool()}} Menerangkan bahwa peserta didik dibawah ini :</p>
                    <table class="table table-borderless table-xs" style="width: 80%;margin-left:auto;margin-right:auto;">
                        <tr>
                            <td class="text-left" style="width: 35%">Nama</td>
                            <td class="text-left" style="width: 65%">: {{$student->student_name}}</td>
                        </tr>
                        <tr>
                            <td class="text-left">NISM</td>
                            <td class="text-left">: {{$student->student_nism}}</td>
                        </tr>
                        <tr>
                            <td class="text-left">NISN</td>
                            <td class="text-left">: {{$student->student_nisn}}</td>
                        </tr>
                        <tr>
                            <td class="text-left">TTL</td>
                            <td class="text-left">: {{$student->student_place_birth}}, {{\Carbon\Carbon::createFromFormat('Y-m-d', $student->student_birthday)->formatLocalized('%d %B %Y')}}</td>
                        </tr>
                        <tr>
                            <td class="text-left">Jenis Kelamin</td>
                            <td class="text-left">: {{$student->student_gender == "L" ? 'Laki - laki' : 'Perempuan'}}</td>
                        </tr>
                        <tr>
                            <td class="text-left">Nama Wali</td>
                            <td class="text-left">: {{$student->student_parent}}</td>
                        </tr>
                    </table>
                    <p class="font-weight-semibold">
                        Telah mengikuti serangkain Kegiatan Ujian Tahun Pelajaran 2019/2020
                        dan berdasarkan Kriteria Kelulusan {{\App\Models\Graduate\Setting::FullNameSchool()}} dinyatakan :
                    </p>
                    @if($student->notify_status == 1)
                        <h2 class="bg-success font-weight-bold mb-3">LULUS</h2>
                        <p>Untuk mencetak Surat Keterangan Lulus, silahkan klik tombol dibawah ini.</p>
                        <form action="{{route('home')}}" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="student_nisn" value="{{$student->student_nisn}}">
                            <button type="submit" class="btn btn-sm btn-info" name="submit" value="print">CETAK SKL</button>
                        </form>
                    @else
                        <h2 class="bg-danger font-weight-bold mb-3">TIDAK LULUS</h2>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
