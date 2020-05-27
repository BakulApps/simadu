@extends('admission.layouts.master')
@section('js')
    <script src="{{asset('assets/global/js/plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('assets/global/js/plugins/styling/uniform.min.js')}}"></script>
    <script src="{{asset("assets/global/js/plugins/selects/select2.min.js")}}"></script>
    <script src="{{asset('assets/global/js/plugins/pickers/daterangepicker.js')}}"></script>
    <script src="{{asset('assets/global/js/plugins/notifications/pnotify.min.js')}}"></script>
@endsection
@section('page')
    <script src="{{asset("assets/sites/admission/js/register.js")}}"></script>
@endsection
@section('breadcrumb')
    <span class="breadcrumb-item active">Pendaftaran</span>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-8">
            <form class="form-register" method="post" action="{{route('admission.register')}}">
                {{csrf_field()}}
                <div class="card">
                    <div class="card-header bg-white header-elements-inline">
                        <h6 class="card-title">Formulir Pendaftaran</h6>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                                <a class="list-icons-item" data-action="reload"></a>
                                <a class="list-icons-item" data-action="remove"></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if(\Session::has('msg'))
                            @php($msg = \Session::get('msg'))
                            <div class="alert alert-{{$msg['class']}} border-0 alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                                <span class="font-weight-bold">{{$msg['title']}}</span> {{$msg['text']}}
                            </div>
                        @endif
                        <h5 class="font-weight-bold">A. Informasi Pribadi</h5>
                        <div class="col-md-12 offset-md-0">
                            <div class="form-group">
                                <label>Nama Lengkap :</label>
                                <input type="text" name="student_name" class="form-control" placeholder="Ex. Muhammad Bahrudin Yusuf" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nomor Induk Siswa Nasional :</label>
                                        <input type="text" name="student_nisn" placeholder="Ex. 0034786736" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nomor Induk Kependudukan :</label>
                                        <input type="text" name="student_nik" placeholder="Ex. 1234512345123456" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tempat Lahir:</label>
                                        <input type="text" name="student_place_birth" class="form-control" placeholder="Ex. Jepara" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tanggal Lahir</label>
                                        <input type="text" name="student_birthday" class="form-control daterange" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Jenis Kelamin : </label>
                                    <div class="form-group">
                                        <select name="student_gender" data-placeholder="Pilih Jenis Kelamin" class="form-control select2" required>
                                            <option></option>
                                            <option value="L">Laki - Laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Agama :</label>
                                        <select name="student_religion" data-placeholder="Pilih Agama Ayah" class="form-control select2" required>
                                            <option></option>
                                            <option value="1">1 - Islam</option>
                                            <option value="2">2 - Kristen Protestan</option>
                                            <option value="3">3 - Katolik</option>
                                            <option value="4">4 - Hindu</option>
                                            <option value="5">5 - Buddha</option>
                                            <option value="6">6 - Kong Hu Cu</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Alamat :</label>
                                <input type="text" name="student_address" class="form-control" placeholder="Ex. Jl. Menoreh No. 7" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Anak Ke :</label>
                                        <input type="text" name="student_place_sibling" class="form-control" placeholder="Ex. 2">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Jumlah Saudara :</label>
                                        <input type="text" name="student_sibling" class="form-control" placeholder="Ex. 3">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Prestasi yang diraih (Peringkat) :</label>
                                <input type="text" name="student_achievement" class="form-control" placeholder="Ex. Juara 1 Lomba Tartil Quran, Juara 2 Lomba Lari">
                            </div>
                        </div>

                        <h5 class="font-weight-bold">B. Informasi Orangtua/Wali</h5>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nomor KK:</label>
                                <input type="text" name="student_no_kk" placeholder="Ex. 1234512345123456" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nama Ayah:</label>
                                <input type="text" name="student_father_name" placeholder="Ex. Muhammad Sufaat" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>NIK Ayah:</label>
                                        <input type="text" name="student_father_nik" placeholder="Ex. 1234512345123456" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Agama Ayah :</label>
                                        <select name="student_father_religion" data-placeholder="Pilih Agama Ayah" class="form-control select2" data-fouc>
                                            <option></option>
                                            <option value="1">1 - Islam</option>
                                            <option value="2">2 - Kristen Protestan</option>
                                            <option value="3">3 - Katolik</option>
                                            <option value="4">4 - Hindu</option>
                                            <option value="5">5 - Buddha</option>
                                            <option value="6">6 - Kong Hu Cu</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Pendidikan Ayah :</label>
                                        <select name="student_father_study" data-placeholder="Pilih Agama Ayah" class="form-control select2" data-fouc>
                                            <option></option>
                                            <option value="1">1 - Tidak Berpendidikan</option>
                                            <option value="2">2 - SD/Sederajat</option>
                                            <option value="3">3 - SMP/Sederajat</option>
                                            <option value="4">4 - SMA/Sederajat</option>
                                            <option value="5">5 - D1</option>
                                            <option value="6">6 - D2</option>
                                            <option value="6">7 - D3</option>
                                            <option value="6">8 - D4/S1</option>
                                            <option value="6">9 - S2</option>
                                            <option value="6">10 - S3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Pekerjaan Ayah :</label>
                                        <select name="student_father_job" data-placeholder="Pilih Pekerjaan Ayah" class="form-control select2" data-fouc>
                                            <option></option>
                                            <option value="1">Tidak Berkerja</option>
                                            <option value="2">Pensiunan</option>
                                            <option value="3">PNS</option>
                                            <option value="4">TNI/Polisi</option>
                                            <option value="5">Guru/Dosen</option>
                                            <option value="6">Pegawai Swasta</option>
                                            <option value="7">Wiraswasta/Wirausaha</option>
                                            <option value="8">Pengacara/Hakim/Jaksa/Notaris</option>
                                            <option value="9">Seniman/Pelukis/Artis/Sejenis</option>
                                            <option value="10">Dokter/Bidan/Perawat</option>
                                            <option value="11">Pilot/Pramugara</option>
                                            <option value="12">Pedagang</option>
                                            <option value="13">Petani/Peternak</option>
                                            <option value="14">Nelayan</option>
                                            <option value="15">Buruh (Tani/Pabrik/Bangunan)</option>
                                            <option value="16">Sopir/Masinis/Kondektur</option>
                                            <option value="17">Politikus</option>
                                            <option value="18">Lainnya</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nama Ibu:</label>
                                <input type="text" name="student_mother_name" placeholder="Ex. Masyayik" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>NIK Ibu:</label>
                                        <input type="text" name="student_mother_nik" placeholder="Ex. 1234512345123456" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Agama Ibu :</label>
                                        <select name="student_mother_religion" data-placeholder="Pilih Agama Ibu" class="form-control select2" data-fouc>
                                            <option></option>
                                            <option value="1">1 - Islam</option>
                                            <option value="2">2 - Kristen Protestan</option>
                                            <option value="3">3 - Katolik</option>
                                            <option value="4">4 - Hindu</option>
                                            <option value="5">5 - Buddha</option>
                                            <option value="6">6 - Kong Hu Cu</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Pendidikan Ibu :</label>
                                        <select name="student_mother_study" data-placeholder="Pilih Agama Ayah" class="form-control select2" data-fouc>
                                            <option></option>
                                            <option value="1">1 - Tidak Berpendidikan</option>
                                            <option value="2">2 - SD/Sederajat</option>
                                            <option value="3">3 - SMP/Sederajat</option>
                                            <option value="4">4 - SMA/Sederajat</option>
                                            <option value="5">5 - D1</option>
                                            <option value="6">6 - D2</option>
                                            <option value="6">7 - D3</option>
                                            <option value="6">8 - D4/S1</option>
                                            <option value="6">9 - S2</option>
                                            <option value="6">10 - S3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Pekerjaan Ibu :</label>
                                        <select name="student_mother_job" data-placeholder="Pilih Pekerjaan Ibu" class="form-control select2" data-fouc>
                                            <option></option>
                                            <option value="1">Tidak Berkerja</option>
                                            <option value="2">Pensiunan</option>
                                            <option value="3">PNS</option>
                                            <option value="4">TNI/Polisi</option>
                                            <option value="5">Guru/Dosen</option>
                                            <option value="6">Pegawai Swasta</option>
                                            <option value="7">Wiraswasta/Wirausaha</option>
                                            <option value="8">Pengacara/Hakim/Jaksa/Notaris</option>
                                            <option value="9">Seniman/Pelukis/Artis/Sejenis</option>
                                            <option value="10">Dokter/Bidan/Perawat</option>
                                            <option value="11">Pilot/Pramugara</option>
                                            <option value="12">Pedagang</option>
                                            <option value="13">Petani/Peternak</option>
                                            <option value="14">Nelayan</option>
                                            <option value="15">Buruh (Tani/Pabrik/Bangunan)</option>
                                            <option value="16">Sopir/Masinis/Kondektur</option>
                                            <option value="17">Politikus</option>
                                            <option value="18">Lainnya</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Penghasilan Orangtua/Wali :</label>
                                        <select name="student_parent_value" data-placeholder="Pilih Penghasilan" class="form-control select2" data-fouc>
                                            <option></option>
                                            <option  value="1">1 - Kurang dari Rp 500.000</option>
                                            <option  value="2">2 - Rp 500.000 - 1.000.000</option>
                                            <option  value="3">3 - Rp 1.000.001 - 2.000.000</option>
                                            <option  value="4">4 - Rp 2.000.001 - 3.000.000</option>
                                            <option  value="5">5 - Rp 3.000.001 - 5.000.000</option>
                                            <option  value="6">6 - Lebih dari Rp 5.000.000</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nomor HP :</label>
                                        <input type="text" name="student_phone" placeholder="Ex. 082229366506" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h5 class="font-weight-bold">C. Informasi Sekolah</h5>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nama Sekolah Asal:</label>
                                <input type="text" name="student_from_school" placeholder="Ex. MI Sido Maju Sioharjo" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>NPSN Sekolah Asal:</label>
                                <input type="text" name="student_from_school_npsn" placeholder="Ex. 09438948" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nomor Ijazah :</label>
                                        <input type="text" name="student_no_ijazah" placeholder="Ex. MI-13 000000001" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nomor SKHUN :</label>
                                        <input type="text" name="student_no_skhun" placeholder="Ex. DN-31 Dd 0469194" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nilai Ujian Akhir :</label>
                                <input type="text" name="student_value_exam" placeholder="Ex. BI : 80, MTK : 90, IPA : 80" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input-styled-success" data-fouc>
                                        Semua data yang di inputkan adalah benar dan tidak ada manipulasi.
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn bg-info btn-labeled btn-labeled-left" name="submit" value="store"><b><i class="icon-paperplane"></i></b> Kirim Pendaftaran</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-white header-elements-inline">
                    <h6 class="card-title">Informasi Pendaftaran</h6>
                </div>
                <div class="card-body">
                    <p class="font-weight-bold">Syarat Pendaftaran : </p>
                    <ul class="list mb-0">
                        <li>Formulir Pendaftaran yang dicetak dari halaman ini</li>
                        <li>Fotokopi Akte Kelahiran 1 Lembar</li>
                        <li>Fotokopi Kartu Keluarga 1 Lembar</li>
                        <li>Fotokopi Ijazah 1 Lembar</li>
                        <li>Fotokopi SKHUN 1 Lembar</li>
                        <li>Fotokopi Kartu PKH/KIP/PIP 1 Lembar (Jika Punya)</li>
                        <li>Foto Berwarna 3x4 4 Lembar</li>
                    </ul>
                    <br>
                    <p class="text-justify">Semua berkas diatas diunggah melalui menu unggah dan dikumpulkan di Ruang Panitia PPDB Online - {{\App\Models\Admission\Setting::SubNameSchool()}} pada saat daftar ulang</p>
                </div>
            </div>
        </div>
    </div>
@endsection
