@extends('graduate.admin.layouts.master')
@section('js')
    <script src="{{asset('assets/global/js/plugins/datatables/datatables.min.js')}}"></script>
    <script src="{{asset('assets/global/js/plugins/selects/select2.min.js')}}"></script>
    <script src="{{asset('assets/global/js/plugins/styling/uniform.min.js')}}"></script>
    <script src="{{asset('assets/global/js/plugins/notifications/pnotify.min.js')}}"></script>
@endsection
@section('jspage')
    <script src="{{asset('assets/sites/graduate/js/admin/value/setting.js')}}"></script>
@endsection
@section('breadcrumb')
    <span class="breadcrumb-item">Penilaian</span>
    <span class="breadcrumb-item active">Pengaturan Penilaian</span>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-white header-elements-inline">
                    <h5 class="card-title">PENGATURAN PENILAIAN</h5>
                </div>
                <div class="card-body">
                    <h4 class="font-weight-semibold mb-3">Masukkan Bobot untuk Nilai Ijazah</h4>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3">Nilai Semester</label>
                        <div class="col-md-3">
                            <input type="text" id="setting_value_semester_point" class="form-control" value="{{\App\Models\Graduate\Setting::value('setting_value_semester_point')}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3">Nilai Ujian</label>
                        <div class="col-md-3">
                            <input type="text" id="setting_value_exam_point" class="form-control" value="{{\App\Models\Graduate\Setting::value('setting_value_exam_point')}}">
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn bg-info btn-labeled btn-labeled-left" id="submit" value="update"><b><i class="icon-floppy-disk"></i></b> SIMPAN</button>
                </div>
            </div>
        </div>
    </div>
@endsection
