@extends('graduate.admin.layouts.master')
@section('js')
    <script src="{{asset('assets/global/js/plugins/selects/select2.min.js')}}"></script>
    <script src="{{asset('assets/global/js/plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('assets/global/js/plugins/pickers/daterangepicker.js')}}"></script>
@endsection
@section('jspage')
    <script src="{{asset('assets/sites/graduate/js/admin/setting.js')}}"></script>
@endsection
@section('breadcrumb')
    <span class="breadcrumb-item active">Pengaturan</span>
@endsection
@section('content')
    @if(Session::has('msg'))
        @php($msg = Session::get('msg'))
    @endif
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-white pb-0 pt-sm-0 pr-sm-0 header-elements-sm-inline">
                    <h6 class="card-title">PENGATURAN</h6>
                    <div class="header-elements">
                        <ul class="nav nav-tabs nav-tabs-bottom card-header-tabs mx-0">
                            <li class="nav-item">
                                <a href="#card-bottom-school" class="nav-link {{empty($msg) || isset($msg['school']) || isset($msg['logo'])? 'active' : null}}" data-toggle="tab"><i class="icon-office mr-2"></i>Sekolah</a>
                            </li>
                            <li class="nav-item">
                                <a href="#card-bottom-notify" class="nav-link {{isset($msg['notify']) ? 'active' : null}}" data-toggle="tab"><i class="icon-file-empty mr-2"></i>Pengumuman</a>
                            </li>
                            <li class="nav-item">
                                <a href="#card-bottom-user" class="nav-link {{isset($msg['user']) ? 'active' : null}}" data-toggle="tab"><i class="icon-user mr-2"></i>Pengguna</a>
                            </li>
                            <li class="nav-item">
                                <a href="#card-bottom-database" class="nav-link {{isset($msg['database']) ? 'active' : null}}" data-toggle="tab"><i class="icon-database mr-2"></i>Basis Data</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body tab-content">
                    <div class="tab-pane fade {{empty($msg) || isset($msg['school']) || isset($msg['logo'])? 'show active' : null}}" id="card-bottom-school">
                        @isset($msg['school'])
                            <div class="alert alert-success">
                                {{$msg['school']}}
                            </div>
                        @endif
                        <form action="{{route('graduate.admin.setting')}}" method="post">
                            {{csrf_field()}}
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Nama Yayasan :</label>
                                <div class="col-md-9">
                                    <input type="text" name="setting_school_fundation" class="form-control" value="{{$setting->setting_school_fundation}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Jenjang Sekolah :</label>
                                <div class="col-md-9">
                                    <select name="setting_school_ladder" class="form-control select">
                                        @foreach(\App\Models\Master\Ladder::OrderBy('ladder_id')->get() as $ladder)
                                            <option value="{{$ladder->ladder_id}}" {{$ladder->ladder_id == $setting->setting_school_ladder ? 'selected' : null}}>{{$ladder->ladder_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Nama Sekolah :</label>
                                <div class="col-md-9">
                                    <input type="text" name="setting_school_name" class="form-control" value="{{$setting->setting_school_name}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Diskripsi Sekolah :</label>
                                <div class="col-md-9">
                                    <input type="text" name="setting_school_slug" class="form-control" value="{{$setting->setting_school_slug}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">NSM :</label>
                                <div class="col-md-9">
                                    <input type="text" name="setting_school_nsm" class="form-control" value="{{$setting->setting_school_nsm}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">NPSN :</label>
                                <div class="col-md-9">
                                    <input type="text" name="setting_school_npsn" class="form-control" value="{{$setting->setting_school_npsn}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Telepon Sekolah :</label>
                                <div class="col-md-9">
                                    <input type="text" name="setting_school_phone" class="form-control" value="{{$setting->setting_school_phone}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Email Sekolah :</label>
                                <div class="col-md-9">
                                    <input type="text" name="setting_school_email" class="form-control" value="{{$setting->setting_school_email}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Website Sekolah :</label>
                                <div class="col-md-9">
                                    <input type="text" name="setting_school_website" class="form-control" value="{{$setting->setting_school_website}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Alamat Sekolah :</label>
                                <div class="col-md-9">
                                    <textarea name="setting_school_address" class="form-control">{{$setting->setting_school_address}}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Kodepos :</label>
                                <div class="col-md-9">
                                    <input type="text" name="setting_school_zipos" class="form-control" value="{{$setting->setting_school_zipos}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Kepala Sekolah :</label>
                                <div class="col-md-9">
                                    <input type="text" name="setting_school_headmaster_name" class="form-control" value="{{$setting->setting_school_headmaster_name}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">NIP Kepala Sekolah :</label>
                                <div class="col-md-9">
                                    <input type="text" name="setting_school_headmaster_nip" class="form-control" value="{{$setting->setting_school_headmaster_nip}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-3"></div>
                                <div class="col-md-9">
                                    <button type="submit" class="btn bg-info btn-labeled btn-labeled-left" name="update" value="school"><b><i class="icon-floppy-disk"></i></b> SIMPAN</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade {{isset($msg['notify']) ? 'show active' : null}}" id="card-bottom-notify">
                        @isset($msg['notify'])
                            <div class="alert alert-success">
                                {{$msg['notify']}}
                            </div>
                        @endif
                        <form action="{{route('graduate.admin.setting')}}" method="post">
                            {{csrf_field()}}
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label">Nomor Surat :</label>
                                <div class="col-md-8">
                                    <input type="text" name="setting_notify_letter" class="form-control" value="{{$setting->setting_notify_letter}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label">Tanggal Pengumuman :</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <input type="text" name="setting_notify_date" class="form-control daterange-time" value="{{\Carbon\Carbon::parse($setting->setting_notify_date)->format('d/m/Y H:i')}}">
                                        <span class="input-group-prepend">
                                        <span class="input-group-text"><i class="icon-calendar2"></i></span>
                                    </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label">Header SKL (format HTML) :</label>
                                <div class="col-md-8">
                                    <textarea name="setting_notify_header" class="form-control">{{$setting->setting_notify_header}}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label">Footer SKL (format HTML) :</label>
                                <div class="col-md-8">
                                    <textarea name="setting_notify_footer" class="form-control">{{$setting->setting_notify_footer}}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4"></div>
                                <div class="col-md-8">
                                    <button type="submit" class="btn bg-info btn-labeled btn-labeled-left" name="update" value="notify"><b><i class="icon-floppy-disk"></i></b> SIMPAN</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade {{isset($msg['user']) ? 'show active' : null}}" id="card-bottom-user">
                        @isset($msg['user'])
                        <div class="alert alert-success">
                            {{$msg['user']}}
                        </div>
                        @endif
                        <form action="{{route('graduate.admin.setting')}}" method="post">
                            {{csrf_field()}}
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Nama Pengguna :</label>
                                <div class="col-md-9">
                                    <input type="text" name="user_name" class="form-control" value="{{auth('graduate')->user()->user_name}}" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Kata Sandi :</label>
                                <div class="col-md-9">
                                    <input type="password" name="user_pass" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Ulangi Sandi :</label>
                                <div class="col-md-9">
                                    <input type="password" name="repeat_user_pass" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Nama Lengkap :</label>
                                <div class="col-md-9">
                                    <input type="text" name="user_fullname" class="form-control" value="{{auth('graduate')->user()->user_fullname}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-3"></div>
                                <div class="col-md-9">
                                    <button type="submit" class="btn bg-info btn-labeled btn-labeled-left" name="update" value="user"><b><i class="icon-floppy-disk"></i></b> SIMPAN</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade {{isset($msg['database']) ? 'show active' : null}}" id="card-bottom-database">
                        @isset($msg['database'])
                            <div class="alert alert-success">
                                {{$msg['database']}}
                            </div>
                        @endif
                        <form action="{{route('graduate.admin.setting')}}" method="post">
                            {{csrf_field()}}
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Basis Data :</label>
                                <div class="col-md-9">
                                    <select name="database_id" class="form-control select">
                                        <option value="1">Data Tahun Pelajaran</option>
                                        <option value="2">Data Pelajaran</option>
                                        <option value="3">Data Siswa</option>
                                        <option value="4">Data Nilai Semester</option>
                                        <option value="5">Data Nilai Ujian</option>
                                        <option value="6">Data Kelulusan</option>
                                    </select>
                                    <p class="text-danger font-italic mt-2">Perhatian! data yang terpilih akan terhapus semua.</p>
                                </div>
                                </p>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-3"></div>
                                <div class="col-md-9">
                                    <button type="submit" class="btn bg-danger btn-labeled btn-labeled-left" name="update" value="database"><b><i class="icon-trash"></i></b> KOSONGKAN</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <form action="{{route('graduate.admin.setting')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">Logo Sekolah</h5>
                    </div>
                    <div class="card-body">
                        <a href="#">
                            <img class="card-img-top img-fluid" src="{{asset('storage/sites/graduate/images/logo_school.png')}}" alt="">
                        </a>
                        <hr>
                        @isset($msg['logo'])
                            <div class="alert alert-success">
                                {{$msg['logo']}}
                            </div>
                        @endif
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input type="file" name="logo_school" class="form-control-uniform-custom" required>
                            </div>
                        </div>
                        <p class="text-danger font-italic">Berkas harus berekstensi .png</p>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn bg-info btn-labeled btn-labeled-left" name="submit" value="upload"><b><i class="icon-floppy-disk"></i></b> SIMPAN</button>
                    </div>
                </form>
        </div>
    </div>
@endsection
