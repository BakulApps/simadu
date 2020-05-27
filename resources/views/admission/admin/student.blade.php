@extends('admission.admin.layouts.master')
@section('js')
    <script src="{{asset('assets/global/js/plugins/datatables/datatables.min.js')}}"></script>
    <script src="{{asset("assets/global/js/plugins/selects/select2.min.js")}}"></script>
    <script src="{{asset('assets/global/js/plugins/notifications/pnotify.min.js')}}"></script>
    <script src="{{asset('assets/global/js/plugins/datatables/extensions/buttons.min.js')}}"></script>
@endsection
@section('page')
    <script src="{{asset("assets/sites/admission/js/admin/student.js")}}"></script>
@endsection
@section('breadcrumb')
    <span class="breadcrumb-item active">Data Pendaftaran</span>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-white header-elements-inline">
                    <h6 class="card-title">Data Pendaftar</h6>
                </div>
                <table class="table table-bordered datatable-student" width="100%">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NISN</th>
                        <th>TTL</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>OrangTua/Wali</th>
                        <th>Program</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('modal')
    <div class="modal fade modal-student" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Informasi Siswa</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <h5 class="font-weight-bold">A. Informasi Pribadi</h5>
                    <div class="col-md-12 offset-md-0">
                        <div class="form-group">
                            <label>Nama Lengkap :</label>
                            <input type="text" id="student_name" class="form-control" placeholder="Ex. Muhammad Bahrudin Yusuf" disabled>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nomor Induk Siswa Nasional :</label>
                                    <input type="text" id="student_nisn" placeholder="Ex. 0034786736" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nomor Induk Kependudukan :</label>
                                    <input type="text" id="student_nik" placeholder="Ex. 1234512345123456" class="form-control" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tempat Lahir:</label>
                                    <input type="text" id="student_place_birth" class="form-control" placeholder="Ex. Jepara" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <input type="text" id="student_birthday" class="form-control daterange">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Jenis Kelamin : </label>
                                <div class="form-group">
                                    <select id="student_gender" data-placeholder="Pilih Jenis Kelamin" class="form-control select2" data-fouc disabled>
                                        <option></option>
                                        <option value="L">Laki - Laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Agama :</label>
                                    <select id="student_religion" data-placeholder="Pilih Agama Ayah" class="form-control select2" data-fouc disabled>
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
                            <input type="text" id="student_address" class="form-control" placeholder="Ex. Jl. Menoreh No. 7" disabled>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Anak Ke :</label>
                                    <input type="text" id="student_place_sibling" class="form-control" placeholder="Ex. 2" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Jumlah Saudara :</label>
                                    <input type="text" id="student_sibling" class="form-control" placeholder="Ex. 3" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Prestasi yang diraih (Peringkat) :</label>
                            <input type="text" id="student_achievement" class="form-control" placeholder="Ex. Juara 1 Lomba Tartil Quran, Juara 2 Lomba Lari" disabled>
                        </div>
                    </div>

                    <h5 class="font-weight-bold">B. Informasi Orangtua/Wali</h5>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Nomor KK:</label>
                            <input type="text" id="student_no_kk" placeholder="Ex. 1234512345123456" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Nama Ayah:</label>
                            <input type="text" id="student_father_name" placeholder="Ex. Muhammad Sufaat" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>NIK Ayah:</label>
                                    <input type="text" id="student_father_nik" placeholder="Ex. 1234512345123456" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Agama Ayah :</label>
                                    <select id="student_father_religion" data-placeholder="Pilih Agama Ayah" class="form-control select2" data-fouc disabled>
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
                                    <select id="student_father_study" data-placeholder="Pilih Agama Ayah" class="form-control select2" data-fouc disabled>
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
                                    <select id="student_father_job" data-placeholder="Pilih Pekerjaan Ayah" class="form-control select2" data-fouc disabled>
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
                            <input type="text" id="student_mother_name" placeholder="Ex. Masyayik" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>NIK Ibu:</label>
                                    <input type="text" id="student_mother_nik" placeholder="Ex. 1234512345123456" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Agama Ibu :</label>
                                    <select id="student_mother_religion" data-placeholder="Pilih Agama Ibu" class="form-control select2" data-fouc disabled>
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
                                    <select id="student_mother_study" data-placeholder="Pilih Agama Ayah" class="form-control select2" data-fouc disabled>
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
                                    <select id="student_mother_job" data-placeholder="Pilih Pekerjaan Ibu" class="form-control select2" data-fouc disabled>
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
                                    <select id="student_parent_value" data-placeholder="Pilih Penghasilan" class="form-control select2" data-fouc disabled>
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
                                    <input type="text" id="student_phone" placeholder="Ex. 082229366506" class="form-control" disabled>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h5 class="font-weight-bold">C. Informasi Sekolah</h5>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Nama Sekolah Asal:</label>
                            <input type="text" id="student_from_school" placeholder="Ex. MI Darul Hikmah Menganti" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>NPSN Sekolah Asal:</label>
                            <input type="text" id="student_from_school_npsn" placeholder="Ex. 09438948" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nomor Ijazah :</label>
                                    <input type="text" id="student_no_ijazah" placeholder="Ex. MI-13 000000001" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nomor SKHUN :</label>
                                    <input type="text" id="student_no_skhun" placeholder="Ex. DN-31 Dd 0469194" class="form-control" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Nilai Ujian Akhir :</label>
                            <input type="text" id="student_value_exam" class="form-control" disabled>
                        </div>
                    </div>
                    <h5 class="font-weight-bold">D. Berkas Persyaratan</h5>
                    <div class="table-responsive">
                        <table class="table table-borderless table-sm">
                            <tr>
                                <td style="width: 1%">1. </td>
                                <td style="text-align: left; width: 60%">Surat Tanda Tamat Belajar (STTB)</td>
                                <td style="text-align: center; width: 1%">:</td>
                                <td style="text-align: left; "><a href="" id="student_sttb_file"></a></td>
                            </tr>
                            <tr>
                                <td>2. </td>
                                <td style="text-align: left; ">Surat Keterangan Hasil Ujian Nasional (SKHUN)</td>
                                <td style="text-align: center; ">:</td>
                                <td style="text-align: left; "><a href="" id="student_skhun_file"></a></td>
                            </tr>
                            <tr>
                                <td>3. </td>
                                <td style="text-align: left; ">Foto</td>
                                <td style="text-align: center; ">:</td>
                                <td style="text-align: left; "><a href="" id="student_photo_file"></a></td>
                            </tr>
                            <tr>
                                <td>4. </td>
                                <td style="text-align: left; ">Akte Kelahiran</td>
                                <td style="text-align: center; ">:</td>
                                <td style="text-align: left; "><a href="" id="student_akta_file"></a></td>
                            </tr>
                            <tr>
                                <td>5. </td>
                                <td style="text-align: left; ">Kartu PKH/KIP/PIP</td>
                                <td style="text-align: center; ">:</td>
                                <td style="text-align: left; "><a href="" id="student_pip_file"></a></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
