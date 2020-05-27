@extends('admission.admin.layouts.master')
@section('js')
    <script src="{{asset("assets/global/js/plugins/filebrowser/jquery.filebrowser.js")}}"></script>
@endsection
@section('page')

@endsection
@section('breadcrumb')
    <span class="breadcrumb-item active">Unggahan</span>
@endsection
@section('content')
    <div class="row">
        <div class="card">
            <div class="card-header header-elements-inline">
                <h6 class="card-title">Berkas Unggahan</h6>
            </div>
            <div class="card-body">
                <div class="tree-sorting card card-body border-left-success border-left-2 shadow-0 rounded-left-0">
                    <div id="files">
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function ()
        {
            $.get("{{url('') .'/storage/sites/admission/images/students/'}}", function(data)
            {
                console.log(data);
                $("#files").append(data);
            });
        })
    </script>
@endsection
