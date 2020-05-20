<!DOCTYPE html>
<html lang="en">
    @include('graduate.admin.layouts.head')
    <body>
        <div class="navbar navbar-expand-md navbar-dark">
            <div class="navbar-brand">
                <a href="{{route('admin.home')}}" class="d-inline-block">
                    <img src="{{asset('assets/global/images/logo_light.png')}}" alt="">
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
                        <a href="{{route('home')}}" class="navbar-nav-link">
                            <i class="icon-display4"></i>
                            <span class="d-md-none ml-2">Portal</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="page-content">
            <div class="content-wrapper">
                <div class="content d-flex justify-content-center align-items-center">
                    <form class="login-form" action="{{route('admin.login')}}" method="post">
                        {{csrf_field()}}
                        <div class="card mb-0">
                            <div class="card-body">

                                <div class="text-center">
                                    <div class="card-img-actions d-inline-block mb-4">
                                        <img src="{{asset('storage/sites/graduate/images/logo_school.png')}}" width="120" height="115" alt="">
                                    </div>
                                </div>
                                <div class="text-center mb-4">
                                    <h6 class="font-weight-semibold mb-0">{{\App\Models\Graduate\Setting::value('setting_school_name')}}</h6>
                                    <span class="d-block text-muted">Halaman Administrator</span>
                                </div>
                                @if(session('msg'))
                                    <div class="alert alert-danger alert-dismissible">{{session('msg')}}</div>
                                @endif
                                <div class="form-group form-group-feedback form-group-feedback-right">
                                    <input type="text" name="user_name" class="form-control" placeholder="Nama Pengguna">
                                    <div class="form-control-feedback">
                                        <i class="icon-user text-muted"></i>
                                    </div>
                                </div>
                                <div class="form-group form-group-feedback form-group-feedback-right">
                                    <input type="password" name="user_pass" class="form-control" placeholder="Kata Sandi">
                                    <div class="form-control-feedback">
                                        <i class="icon-key text-muted"></i>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block" name="submit" value="logged">MASUK</button>
                            </div>
                        </div>
                    </form>
                </div>
                @include('graduate.admin.layouts.footer')
            </div>
        </div>
    </body>
</html>
