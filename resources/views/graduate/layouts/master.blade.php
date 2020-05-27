<!DOCTYPE html>
<html lang="en">
    @include('graduate.layouts.head')
    <body>
        <div class="navbar navbar-expand-md navbar-dark">
            <div class="navbar-brand">
                <a href="{{route('graduate.home')}}" class="d-inline-block">
                    <img src="{{asset('assets/global/images/logo_app.png')}}" alt="">
                </a>
            </div>
            <div class="d-md-none">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
                    <i class="icon-tree5"></i>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="navbar-mobile">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a href="{{route('graduate.home')}}" class="navbar-nav-link">
                            <i class="icon-display4"></i>
                            <span class="d-md-none ml-2">Portal</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="{{route('graduate.admin.home')}}" class="navbar-nav-link">
                            <i class="icon-enter2"></i>
                            <span class="d-md-none ml-2">Masuk</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="page-content">
            <div class="content-wrapper">
                <div class="content d-flex justify-content-center align-items-center">
                    @yield('content')
                </div>
                @include('graduate.layouts.footer')
            </div>
        </div>
    </body>
</html>
