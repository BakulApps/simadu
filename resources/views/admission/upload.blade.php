@extends('admission.layouts.master')
@section('js')
    <script src="{{asset('assets/global/js/plugins/styling/uniform.min.js')}}"></script>
@endsection
@section('page')
    <script src="{{asset('assets/sites/admission/js/upload.js')}}"></script>
@endsection
@section('breadcrumb')
    <span class="breadcrumb-item active">Unggah Persyaratan</span>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-white header-elements-inline">
                    <h6 class="card-title">Unggah Persyaratan</h6>
                </div>
                @if(isset($student))
                <form class="form-upload" method="post" action="{{route('admission.upload')}}" enctype="multipart/form-data">
                    {{csrf_field()}}
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
                                    <input type="text" class="form-control" value="{{\Carbon\Carbon::parse($student->student_birthday)->formatLocalized('%d %B %Y')}}" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Unggah Ijazah</label>
                            <input type="file" name="student_sttb_file" class="form-control-uniform">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Unggah SKHUN</label>
                            <input type="file" name="student_skhun_file" class="form-control-uniform" data-fouc>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Unggah Foto</label>
                            <input type="file" name="student_photo_file" class="form-control-uniform" data-fouc>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Unggah Akta Kelahiran</label>
                            <input type="file" name="student_akta_file" class="form-control-uniform" data-fouc>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Unggah Kartu Keluarga</label>
                            <input type="file" name="student_kk_file" class="form-control-uniform" data-fouc>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Unggah Kartu Bantuan</label>
                            <input type="file" name="student_pip_file" class="form-control-uniform" data-fouc>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn bg-info btn-labeled btn-labeled-left" name="submit" value="upload"><b><i class="icon-paperplane"></i></b> Kirim Berkas</button>
                    </div>
                </form>
                @else
                    <div class="card-body">
                        @if(\Session::has('msg'))
                            @php($msg = \Session::get('msg'))
                            <div class="alert alert-{{$msg['class']}} alert-styled-left alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                                <span class="font-weight-semibold"><b>{{$msg['title']}}!</b></span> {{$msg['text']}}
                            </div>
                        @else
                            <p>Silahkan masukkan NISN diform samping berikut ini. Pastikan Nama dan Tempat
                                Tanggal lahir sesuai dengan yang dimasukkan ketika mendaftar. setelah itu unggah berkas yang dibutuhkan</p>
                        @endif
                    </div>
                @endif
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <form class="form-search" method="post" action="{{url('ppdb/unggah')}}">
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
