@extends('graduate.admin.layouts.master')
@section('js')
    <script src="{{asset('assets/global/js/plugins/datatables/datatables.min.js')}}"></script>
    <script src="{{asset('assets/global/js/plugins/selects/select2.min.js')}}"></script>
    <script src="{{asset('assets/global/js/plugins/styling/uniform.min.js')}}"></script>
    <script src="{{asset('assets/global/js/plugins/notifications/pnotify.min.js')}}"></script>
@endsection
@section('jspage')
    <script src="{{asset('assets/sites/graduate/js/admin/value/exam.js')}}"></script>
@endsection
@section('breadcrumb')
    <span class="breadcrumb-item">Penilaian</span>
    <span class="breadcrumb-item active">Nilai Ujian</span>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-white header-elements-inline">
                    <h5 class="card-title">NILAI UJIAN</h5>
                    <div class="header-elements">
                        <button type="button" class="btn btn-primary btn-labeled btn-labeled-left ml-3" data-toggle="modal" data-target="#modal-upload"><b><i class="icon-upload4"></i></b>UNGGAH</button>
                    </div>
                </div>
                <table class="table table-sm table-bordered datatable-exam">
                    <thead>
                    <tr class="text-center">
                        <td>NAMA SISWA</td>
                        @foreach(\App\Models\Master\Subject::OrderBy('subject_number')->get() as $subject)
                            <td>{{$subject->subject_code}}</td>
                        @endforeach
                    </tr>
                    </thead>
                    <tbody class="text-center">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('modal')
    <div id="modal-upload" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-white">
                    <h5 class="modal-title">Unggah Nilai Ujian</h5>
                </div>
                <div class="modal-body">
                    <p class="text-danger font-italic">Menggungah berkas berarti menghapus data sebelumnya.</p>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12">
                                <input type="file" id="value_exam" class="form-control-uniform-custom">
                            </div>
                        </div>
                    </div>
                    <p>Silahkan unduh template Nilai Ujian <a href="{{route('graduate.admin.value.exam')}}/?_type=download&_data=value_exam" class="badge badge-info">disini</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection
