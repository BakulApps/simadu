<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        {{\App\Models\Admission\Setting::value('setting_app_subname')}} -
        {{\App\Models\Admission\Setting::SubNameSchool()}}</title>

    <link href="{{asset('assets/global/fonts/icomoon/styles.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/sites/admission/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/sites/admission/css/bootstrap_limitless.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/sites/admission/css/layout.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/sites/admission/css/components.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/sites/admission/css/colors.min.css')}}" rel="stylesheet" type="text/css">

    <script src="{{asset('assets/global/js/cores/jquery.min.js')}}"></script>
    <script src="{{asset('assets/global/js/cores/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/global/js/cores/blockui.min.js')}}"></script>
    <script src="{{asset('assets/global/js/cores/ripple.min.js')}}"></script>
    @yield('js')

    <script src="{{asset('assets/sites/admission/js/app.js')}}"></script>
    @yield('page')
</head>
