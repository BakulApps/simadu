<div class="navbar navbar-expand-md navbar-dark bg-indigo navbar-static">
    <div class="navbar-brand">
        <a href="{{route('admission.admin.home')}}" class="d-inline-block"><img src="{{asset('assets/global/images/logo_app.png')}}" alt=""></a>
    </div>
    <div class="d-md-none">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
            <i class="icon-tree5"></i>
        </button>
        <button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
            <i class="icon-paragraph-justify3"></i>
        </button>
    </div>
    <div class="collapse navbar-collapse" id="navbar-mobile">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
                    <i class="icon-paragraph-justify3"></i>
                </a>
            </li>
        </ul>
        @if(auth('admission')->check())
        <ul class="navbar-nav ml-md-auto">
            <li class="nav-item">
                <a href="{{route('admission.admin.logout')}}" class="navbar-nav-link">
                    <i class="icon-exit3"></i>
                </a>
            </li>
        </ul>
        @endif
    </div>
</div>
