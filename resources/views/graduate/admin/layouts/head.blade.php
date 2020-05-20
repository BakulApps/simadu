<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{csrf_token()}}">

    <title>
        {{\App\Models\Graduate\Setting::value('setting_app_subname')}} -
        {{\App\Models\Graduate\Setting::SubNameSchool()}}</title>

    <link rel="shortcut icon" href="{{asset('storage/sites/graduate/images/logo_school.png')}}">
    <!-- <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css"> -->
    <link href="{{asset('assets/global/fonts/icomoon/styles.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/sites/graduate/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/sites/graduate/css/bootstrap_limitless.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/sites/graduate/css/layout.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/sites/graduate/css/components.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/sites/graduate/css/colors.min.css')}}" rel="stylesheet" type="text/css">

    <script src="{{asset('assets/global/js/cores/jquery.min.js')}}"></script>
    <script src="{{asset('assets/global/js/cores/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/global/js/cores/blockui.min.js')}}"></script>
    <script src="{{asset('assets/global/js/plugins/styling/uniform.min.js')}}"></script>
    @yield('js')

    <script src="{{asset('assets/sites/graduate/js/app.js')}}"></script>
    @yield('jspage')
</head>
