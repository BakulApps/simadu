@extends('graduate.admin.layouts.master')
@section('js')
    <script src="{{asset('assets/global/js/plugins/datatables/datatables.min.js')}}"></script>
    <script src="{{asset('assets/global/js/plugins/selects/select2.min.js')}}"></script>
    <script src="{{asset('assets/global/js/plugins/styling/uniform.min.js')}}"></script>
    <script src="{{asset('assets/global/js/plugins/notifications/pnotify.min.js')}}"></script>
@endsection
@section('jspage')
    <script src="{{asset('assets/sites/graduate/js/admin/master/subject.js')}}"></script>
@endsection
@section('breadcrumb')
    <span class="breadcrumb-item">Master Data</span>
    <span class="breadcrumb-item active">Mata Pelajaran</span>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header bg-white header-elements-inline">
                    <h5 class="card-title">MATA PELAJARAN</h5>
                    <div class="header-elements">
                        <button type="button" class="btn btn-sm btn-primary btn-labeled btn-labeled-left" data-toggle="modal" data-target="#modal-upload"><b><i class="icon-upload4"></i></b>UNGGAH</button>
                    </div>
                </div>
                <table class="table datatable-subject table-bordered">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Diskripsi</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header bg-white header-elements-inline">
                    <h5 class="card-title title-add">TAMBAH DATA</h5>
                </div>
                <div class="card-body">
                    <input type="hidden" id="subject_id">
                    <div class="form-group">
                        <label>Nomer Urut</label>
                        <input type="text" id="subject_number" class="form-control" placeholder="Ex. 1">
                    </div>
                    <div class="form-group">
                        <label>Kode Pelajaran</label>
                        <input type="text" id="subject_code" class="form-control" placeholder="Ex. MTK">
                    </div>
                    <div class="form-group">
                        <label>Nama Pelajaran</label>
                        <input type="text" id="subject_name" class="form-control" placeholder="Ex. Matematika">
                    </div>
                    <div class="form-group">
                        <label>Diskripsi Pelajaran</label>
                        <textarea id="subject_desc" class="form-control" placeholder="Ex. Pelajaran Matematika"></textarea>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn bg-info btn-labeled btn-labeled-left btn-sm" id="submit" value="store"><b><i class="icon-floppy-disk"></i></b> Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('modal')
    <div id="modal-upload" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-white">
                    <h5 class="modal-title">Unggah Pelajaran</h5>
                </div>
                <div class="modal-body">
                    <p class="text-danger font-italic">Menggungah berkas berarti menghapus data sebelumnya.</p>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12">
                                <input type="file" id="data_subject" class="form-control-uniform-custom">
                            </div>
                        </div>
                    </div>
                    <p>Silahkan unduh template Mata pelajaran <a href="{{route('admin.master.subject')}}/?_type=download&_data=subject" class="badge badge-info">disini</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection
