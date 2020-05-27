<!DOCTYPE html>
<html lang="id">
    @include('admission.admin.layouts.head')
    <body>
    <script type="text/javascript">
        var baseurl = "{{route('admission.admin.home')}}";
    </script>
        @include('admission.admin.layouts.navbar')
        <div class="page-content">
            <div class="sidebar sidebar-light sidebar-main sidebar-expand-md">
                <div class="sidebar-mobile-toggler text-center">
                    <a href="#" class="sidebar-mobile-main-toggle">
                        <i class="icon-arrow-left8"></i>
                    </a>
                    Navigasi
                    <a href="#" class="sidebar-mobile-expand">
                        <i class="icon-screen-full"></i>
                        <i class="icon-screen-normal"></i>
                    </a>
                </div>
                <div class="sidebar-content">
                    <div class="sidebar-user-material">
                        <div class="sidebar-user-material-body">
                            <div class="card-body text-center">
                                <a href="#">
                                    <img src="{{asset('storage/sites/admission/images/logo_school.png')}}" class="img-fluid mb-3" width="100" height="100" alt="">
                                </a>
                                <h6 class="mb-0 text-white text-shadow-dark">{{auth('admission')->user()->user_fullname}}</h6>
                                <span class="font-size-sm text-white text-shadow-dark">{{\App\Models\Admission\Setting::SubNameSchool()}}</span>
                            </div>
                            <div class="sidebar-user-material-footer">
                                <a href="#" class="d-flex justify-content-between align-items-center text-shadow-dark dropdown-toggle" data-toggle="collapse">
                                    <span>Menu Utama</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    @include('admission.admin.layouts.mainmenu')
                </div>
            </div>
            <div class="content-wrapper">
                <div class="page-header page-header-light">
                    <div class="page-header-content header-elements-md-inline">
                        <div class="page-title d-flex">
                            <h4>
                                <i class="icon-display mr-2"></i>
                                <span class="font-weight-semibold">{{\App\Models\Admission\Setting::value('setting_app_subname')}}</span> -
                                {{\App\Models\Admission\Setting::SubNameSchool()}}
                            </h4>
                            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                        </div>
                    </div>
                    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
                        <div class="d-flex">
                            <div class="breadcrumb">
                                <a href="{{route('admission.admin.home')}}" class="breadcrumb-item"><i class="icon-display mr-2"></i> Dashboard</a>
                                @yield('breadcrumb')
                            </div>
                            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                        </div>
                    </div>
                </div>
                <div class="content">
                    @yield('content')
                </div>
                @include('admission.admin.layouts.footer')
            </div>
        </div>
    @yield('modal')
    </body>
</html>
