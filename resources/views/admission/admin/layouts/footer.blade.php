<div class="navbar navbar-expand-lg navbar-light">
    <div class="text-center d-lg-none w-100">
        <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
            <i class="icon-unfold mr-2"></i>
            Footer
        </button>
    </div>
    <div class="navbar-collapse collapse" id="navbar-footer">
        <span class="navbar-text">
            {{\App\Models\Admission\Setting::value('setting_app_subname') . ' ' . \Carbon\Carbon::now()->format('Y')}} -
            Copyright By <a href="#">{{\App\Models\Admission\Setting::SubNameSchool()}}</a> Created by <a href="#" target="_blank">BakulApps</a>
        </span>
        <ul class="navbar-nav ml-lg-auto">
            <li class="nav-item"><a href="#" class="navbar-nav-link" target="_blank"><i class="icon-lifebuoy mr-2"></i> Dukungan</a></li>
            <li class="nav-item"><a href="#" class="navbar-nav-link" target="_blank"><i class="icon-file-text2 mr-2"></i> Dokumen</a></li>
        </ul>
    </div>
</div>
