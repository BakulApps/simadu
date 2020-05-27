<div class="page-header page-header-light">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><i class="icon-display mr-2"></i>
                <span class="font-weight-semibold">{{\App\Models\Graduate\Setting::FullNameApp()}}</span> -
                {{\App\Models\Graduate\Setting::SubNameSchool()}}</h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>
    </div>

    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{route('graduate.admin.home')}}" class="breadcrumb-item"><i class="icon-display mr-2"></i> Beranda</a>
                @yield('breadcrumb')
            </div>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>
    </div>
</div>
