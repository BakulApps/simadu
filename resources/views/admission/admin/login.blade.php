<!DOCTYPE html>
<html lang="id">
    @include('admission.admin.layouts.head')
    <body>
        <div class="navbar navbar-expand-md navbar-dark bg-indigo navbar-static">
            <div class="navbar-brand">
                <a href="{{route('admission.admin.home')}}" class="d-inline-block">
                    <img src="{{asset('/assets/global/images/logo_app.png')}}" alt="">
                </a>
            </div>
            <div class="d-md-none">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></button>
            </div>
        </div>
        <div class="page-content">
            <div class="content-wrapper">
                <div class="content d-flex justify-content-center align-items-center">
                    <form class="login-form" action="{{route('admission.admin.login')}}" method="post">
                        {{csrf_field()}}
                        <div class="card mb-1">
                            <div class="card-body">
                                <div class="text-center mb-2">
                                    <img class="mb-2" src="{{asset('/storage/sites/admission/images/logo_school.png')}}" width="60%" alt="">
                                    <h5 class="mb-2">{{\App\Models\Admission\Setting::value('setting_app_subname')}}</h5>
                                    <span class="d-block text-muted">{{\App\Models\Admission\Setting::SubNameSchool()}}</span>
                                </div>
                                @if(!empty(session('msg')))
                                    <div class="alert alert-danger alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                                        <span class="font-weight-bold">Kesalahan!</span> {{session('msg')}}
                                    </div>
                                @endif
                                <div class="form-group form-group-feedback form-group-feedback-left">
                                    <input type="text" class="form-control" name="user_name" placeholder="Nama Pengguna">
                                    <div class="form-control-feedback">
                                        <i class="icon-user text-muted"></i>
                                    </div>
                                </div>
                                <div class="form-group form-group-feedback form-group-feedback-left">
                                    <input type="password" class="form-control" name="user_pass" placeholder="Kata Sandi">
                                    <div class="form-control-feedback">
                                        <i class="icon-lock2 text-muted"></i>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">MASUK</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                @include('admission.admin.layouts.footer')
            </div>
        </div>
    </body>
</html>

