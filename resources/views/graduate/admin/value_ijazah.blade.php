@extends('graduate.admin.layouts.master')
@section('js')
    <script src="{{asset('assets/global/js/plugins/datatables/datatables.min.js')}}"></script>
    <script src="{{asset('assets/global/js/plugins/selects/select2.min.js')}}"></script>
    <script src="{{asset('assets/global/js/plugins/styling/uniform.min.js')}}"></script>
    <script src="{{asset('assets/global/js/plugins/notifications/pnotify.min.js')}}"></script>
@endsection
@section('jspage')
    <script src="{{asset('assets/sites/graduate/js/admin/value/ijazah.js')}}"></script>
@endsection
@section('breadcrumb')
    <span class="breadcrumb-item">Penilaian</span>
    <span class="breadcrumb-item active">Nilai Ijazah</span>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-white header-elements-inline">
                    <h5 class="card-title">NILAI IJAZAH</h5>
                </div>
                <table class="table table-sm table-bordered datatable-ijazah">
                    <thead>
                    <tr class="text-center">
                        <td>NAMA SISWA</td>
                        @foreach(\App\Models\Graduate\Master\Subject::OrderBy('subject_number')->get() as $subject)
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
