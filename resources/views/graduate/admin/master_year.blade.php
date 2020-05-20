@extends('graduate.admin.layouts.master')
@section('js')
    <script src="{{asset('assets/global/js/plugins/datatables/datatables.min.js')}}"></script>
    <script src="{{asset('assets/global/js/plugins/selects/select2.min.js')}}"></script>
    <script src="{{asset('assets/global/js/plugins/notifications/pnotify.min.js')}}"></script>
@endsection
@section('jspage')
    <script src="{{asset('assets/sites/graduate/js/admin/master/year.js')}}"></script>
@endsection
@section('breadcrumb')
    <span class="breadcrumb-item">Master Data</span>
    <span class="breadcrumb-item active">Tahun Pelajaran</span>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header bg-white header-elements-sm-inline">
                    <h5 class="card-title">TAHUN PELAJARAN</h5>
                </div>
                <table class="table datatable-year table-bordered">
                    <thead>
                    <tr>
                        <th>Urutan</th>
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
                    <input type="hidden" id="year_id">
                    <div class="form-group">
                        <label>Nomer Urut</label>
                        <input type="text" id="year_number" class="form-control" placeholder="Ex. 1">
                    </div>
                    <div class="form-group">
                        <label>Nama Tahun</label>
                        <input type="text" id="year_name" class="form-control" placeholder="Ex. 2019/2020">
                    </div>
                    <div class="form-group">
                        <label>Diskripsi Tahun</label>
                        <textarea id="year_desc" class="form-control" placeholder="Ex. TP. 2019/2020"></textarea>
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
                <div class="modal-header">
                    <h5 class="modal-title">Unggah Siswa</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="{{route('admin.student')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="_type" value="submit">
                    <input type="hidden" name="_data" value="upload">
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-12">
                                    <input type="file" name="data_student" class="form-control-uniform-custom">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn bg-primary">Unggah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
