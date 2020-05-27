@extends('admission.layouts.master')
@section('breadcrumb')
    <span class="breadcrumb-item active">Pengumuman</span>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-white header-elements-inline">
                    <h6 class="card-title">Pengumuman Peserta PPDB</h6>
                </div>
                @if(isset($student))
                    <input type="hidden" name="student_nisn" value="{{$student->student_nisn}}">
                    <div class="card-body">
                        <div class="form-group">
                            <label class="col-form-label">Nama Lengkap :</label>
                            <input type="text" class="form-control" value="{{$student->student_name}}" disabled>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label class="col-form-label">Tempat Lahir :</label>
                                    <input type="text" class="form-control" value="{{$student->student_place_birth}}" disabled>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-form-label">Tanggal Lahir :</label>
                                    <input type="text" class="form-control" value="{{$student->student_birthday}}" disabled>
                                </div>
                            </div>
                        </div>
                        @if(\App\Models\Admission\Setting::value('setting_app_notify') <= \Carbon\Carbon::now())
                            <h4 class="text-center font-weight-bold">MOHOM MAAF, {{$student->student_name}}</h4>
                            <h4 class="text-center">Pengumuman dibuka pada tanggal {{\Carbon\Carbon::parse(\App\Models\Admission\Setting::value('setting_app_notify'))->formatLocalized('%d %B %Y')}}</h4>
                        @else
                            @if($student->student_status == 2)
                                <h4 class="text-center font-weight-bold">SELAMAT, {{$student->student_name}}</h4>
                                <h4 class="text-center">Anda diterima sebagai peserta didik {{\App\Models\Admission\Setting::SubNameSchool()}}</h4>
                                <h4 class="text-center">Tahun Pelajaran 2020/2021</h4>
                                <h4 class="text-center">Persiapkan berkas anda untuk Pendaftaran Ulang.</h4>
                            @else($student->student_status == 1)
                                <h4 class="text-center font-weight-bold">MOHOM MAAF, {{$student->student_name}}</h4>
                                <h4 class="text-center">Anda belum bisa kami terima sebagai peserta didik</h4>
                                <h4 class="text-center">{{\App\Models\Admission\Setting::SubNameSchool()}} Tahun Pelajaran 2020/2021</h4>
                            @endif
                        @endif
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn bg-info btn-labeled btn-labeled-left" name="submit" value="upload"><b><i class="icon-printer"></i></b> Cetak</button>
                    </div>
                @else
                    <div class="card-body">
                        <p>Untuk melihat pengumuman Penerimaan, Silahkan masukkan NISN terdaftar diform samping berikut ini. Pastikan Nama dan Tempat
                            Tanggal lahir sesuai dengan yang dimasukkan ketika mendaftar.</p>
                    </div>
                @endif
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <form class="form-search" method="post" action="{{route('admission.notice')}}">
                        {{csrf_field()}}
                        <div class="form-group">
                            <div class="row">
                                <label class="col-form-label col-md-12">Masukkan NISN :</label>
                                <div class="col-lg-8">
                                    <input type="text" name="student_nisn" class="form-control" placeholder="Ex. 0098478765">
                                </div>
                                <div class="col-lg-4">
                                    <button type="submit" class="btn btn-info" name="submit" value="search"><i class="icon-search4"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
