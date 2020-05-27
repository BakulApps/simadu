@extends('admission.admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3">
                    <div class="card bg-success">
                        <div class="card-body text-center">
                            <i class="icon-user icon-2x text-white border-white border-3 rounded-round p-3 mb-2 mt-1"></i>
                            <h5 class="card-title font-weight-bold">{{\App\Models\Admission\Student::count()}} Siswa</h5>
                            <h5 class="card-title">Jumlah Pendaftar</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-warning">
                        <div class="card-body text-center">
                            <i class="icon-coin-dollar icon-2x text-white border-white border-3 rounded-round p-3 mb-2 mt-1"></i>
                            <h5 class="card-title font-weight-bold">{{\App\Models\Admission\Student::where('student_pip_file', '!=' ,null)->count()}} Siswa</h5>
                            <h5 class="card-title">Penerima Bantuan</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-info">
                        <div class="card-body text-center">
                            <i class="icon-file-empty icon-2x text-white border-white border-3 rounded-round p-3 mb-2 mt-1"></i>
                            <h5 class="card-title font-weight-bold">{{\App\Models\Admission\Student::where('student_sttb_file', '!=' ,null)->count()}} Berkas</h5>
                            <h5 class="card-title">Ijazah Terunggah</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-purple">
                        <div class="card-body text-center">
                            <i class="icon-newspaper2 icon-2x text-white border-white border-3 rounded-round p-3 mb-2 mt-1"></i>
                            <h5 class="card-title font-weight-bold">{{\App\Models\Admission\Student::where('student_skhun_file', '!=' ,null)->count()}} Siswa</h5>
                            <h5 class="card-title">SKHUN Terunggah</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
