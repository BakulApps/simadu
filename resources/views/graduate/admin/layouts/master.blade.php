<!DOCTYPE html>
<html lang="en">
    @include('graduate.admin.layouts.head')
    <body>
    <script>
        var baseurl = '{{route('graduate.admin.home')}}'
    </script>
        @include('graduate.admin.layouts.navbar')
        <div class="page-content">
            <div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">
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
                    <div class="sidebar-user">
                        <div class="card-body">
                            <div class="media">
                                <div class="mr-2">
                                    <a href="#"><img src="{{asset('storage/sites/graduate/images/logo_school.png')}}" width="40" height="40" alt=""></a>
                                </div>
                                <div class="media-body">
                                    <div class="media-title font-weight-semibold">{{\App\Models\Graduate\Setting::SubNameSchool()}}</div>
                                    <div class="font-size-xs opacity-50">
                                        <i class="icon-pin font-size-sm"></i> &nbsp;{{\App\Models\Graduate\Setting::value('setting_school_address')}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('graduate.admin.layouts.mainmenu')
                </div>
            </div>
            <div class="content-wrapper">
                @include('graduate.admin.layouts.header')
                <div class="content">
                    @yield('content')
                </div>
                @include('graduate.admin.layouts.footer')
            </div>
        </div>
    @yield('modal')
    </body>
</html>
