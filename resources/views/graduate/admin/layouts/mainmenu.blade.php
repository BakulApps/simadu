<div class="card card-sidebar-mobile">
    <ul class="nav nav-sidebar" data-nav-type="accordion">
        <li class="nav-item"><a href="{{route('admin.home')}}" class="nav-link"><i class="icon-display"></i><span>Beranda</span></a></li>
        <li class="nav-item nav-item-submenu">
            <a href="#" class="nav-link"><i class="icon-archive"></i> <span>Master Data</span></a>
            <ul class="nav nav-group-sub" data-submenu-title="Penialian">
                <li class="nav-item"><a href="{{route('admin.master.year')}}" class="nav-link">Tahun Pelajaran</a></li>
                <li class="nav-item"><a href="{{route('admin.master.subject')}}" class="nav-link">Mata Pelajaran</a></li>
            </ul>
        </li>
        <li class="nav-item"><a href="{{route('admin.student')}}" class="nav-link"><i class="icon-user"></i><span>Data Siswa</span></a></li>
        <li class="nav-item nav-item-submenu">
            <a href="#" class="nav-link"><i class="icon-file-empty"></i> <span>Penilaian</span></a>
            <ul class="nav nav-group-sub" data-submenu-title="Penialian">
                <li class="nav-item"><a href="{{route('admin.value.semester')}}" class="nav-link">Nilai Semester</a></li>
                <li class="nav-item"><a href="{{route('admin.value.exam')}}" class="nav-link">Nilai Ujian</a></li>
                <li class="nav-item"><a href="{{route('admin.value.ijazah')}}" class="nav-link">Nilai Ijazah</a></li>
                <li class="nav-item"><a href="{{route('admin.value.setting')}}" class="nav-link">Pengaturan Nilai</a></li>
            </ul>
        </li>
        <li class="nav-item"><a href="{{route('admin.notify')}}" class="nav-link"><i class="icon-graduation"></i><span>Kelulusan</span></a></li>
        <li class="nav-item"><a href="{{route('admin.setting')}}" class="nav-link"><i class="icon-cog"></i><span>Pengaturan</span></a></li>
    </ul>
</div>
