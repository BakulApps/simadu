@extends('admission.layouts.master')
@section('breadcrumb')
    <span class="breadcrumb-item active">Pengumuman</span>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <form class="form-search" method="post" action="{{route('admission.print')}}">
                        {{csrf_field()}}
                        <div class="form-group">
                            <div class="row">
                                <label class="col-form-label col-md-12">Masukkan NISN :</label>
                                <div class="col-lg-8">
                                    <input type="text" name="student_nisn" class="form-control" placeholder="Ex. 0098478765">
                                </div>
                                <div class="col-lg-4">
                                    <button type="submit" class="btn btn-info" name="submit" value="search"><i class="icon-search4"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-white header-elements-inline">
                    <h6 class="card-title">Cetak Formulir</h6>
                </div>
                @if(isset($student))
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <tr>
                                <td colspan="4" class="font-weight-bold">I. INFORMASI PRIBADI</td>
                            </tr>
                            <tr>
                                <td class="text-right" style="width: 1%;">1. </td>
                                <td style="width: 20%">Nama Lengkap</td>
                                <td class="text-center" style="width: 1%;">:</td>
                                <td>{{$student->student_name}}</td>
                            </tr>
                            <tr>
                                <td class="text-right" style="width: 1%;">2. </td>
                                <td>Nomo Induk Siswa Nasional</td>
                                <td class="text-center" style="width: 1%;">:</td>
                                <td>{{$student->student_nisn}}</td>
                            </tr>
                            <tr>
                                <td class="text-right" style="width: 5%">3. </td>
                                <td>Nomo Induk Kependudukan</td>
                                <td class="text-right" style="width: 5%">:</td>
                                <td>{{$student->student_nik}}</td>
                            </tr>
                            <tr>
                                <td class="text-right" style="width: 5%">4. </td>
                                <td>Tempat, Tanggal Lahir</td>
                                <td class="text-right" style="width: 5%">:</td>
                                <td>{{$student->student_place_birth}}, {{date('d M Y', strtotime($student->student_birthday))}}</td>
                            </tr>
                            <tr>
                                <td class="text-right" style="width: 5%">5. </td>
                                <td>Jenis Kelamin</td>
                                <td class="text-right" style="width: 5%">:</td>
                                <td>{{$student->student_gender == "L" ? "Laki - Laki" : "Perempuan"}}</td>
                            </tr>
                            <tr>
                                <td class="text-right" style="width: 5%">6. </td>
                                <td>Agama</td>
                                <td class="text-right" style="width: 5%">:</td>
                                <td>{{$religion[$student->student_religion]}}</td>
                            </tr>
                            <tr>
                                <td class="text-right" style="width: 5%">7. </td>
                                <td>Alamat</td>
                                <td class="text-right" style="width: 5%">:</td>
                                <td>{{$student->student_address}}</td>
                            </tr>
                            <tr>
                                <td class="text-right" style="width: 5%">8. </td>
                                <td>Anak Ke</td>
                                <td class="text-right" style="width: 5%">:</td>
                                <td>{{$student->student_place_sibling}}</td>
                            </tr>
                            <tr>
                                <td class="text-right" style="width: 5%">9. </td>
                                <td>Jumlah Saudara</td>
                                <td class="text-right" style="width: 5%">:</td>
                                <td>{{$student->student_sibling}}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <tr>
                                <td colspan="10" class="text-left font-weight-bold">II. INFORMASI ORANGTUA/WALI</td>
                            </tr>
                            <tr>
                                <td class="text-right" style="width: 1%">1. </td>
                                <td>Nomor Kartu Keluarga</td>
                                <td class="text-center" style="width: 1%">:</td>
                                <td colspan="6" style="text-align: left; ">{{$student->student_no_kk}}</td>
                            </tr>
                            <tr>
                                <td class="text-right" style="width: 1%">2. </td>
                                <td style="width: 20%">Nama</td>
                                <td class="text-right" style="width: 1%">:</td>
                                <td style="width: 5%">Ayah</td>
                                <td class="text-center" style="width: 1%">:</td>
                                <td>{{$student->student_father_name}}</td>
                                <td style="width: 5%">Ibu</td>
                                <td class="text-center" style="width: 1%;">:</td>
                                <td>{{$student->student_mother_name}}</td>
                            </tr>
                            <tr>
                                <td class="text-right">3. </td>
                                <td>Nomor Induk Kependudukan</td>
                                <td class="text-center">:</td>
                                <td>Ayah</td>
                                <td class="text-center">:</td>
                                <td>{{$student->student_father_nik}}</td>
                                <td>Ibu</td>
                                <td class="text-center">:</td>
                                <td>{{$student->student_mother_nik}}</td>
                            </tr>
                            <tr>
                                <td class="text-right">4. </td>
                                <td>Agama</td>
                                <td class="text-center">:</td>
                                <td>Ayah</td>
                                <td class="text-center">:</td>
                                <td>{{$religion[$student->student_father_religion]}}</td>
                                <td>Ibu</td>
                                <td class="text-center">:</td>
                                <td>{{$religion[$student->student_mother_religion]}}</td>
                            </tr>
                            <tr>
                                <td class="text-right">5. </td>
                                <td>Pendidikan</td>
                                <td class="text-center">:</td>
                                <td>Ayah</td>
                                <td class="text-center">:</td>
                                <td>{{$study[$student->student_father_study]}}</td>
                                <td>Ibu</td>
                                <td class="text-center">:</td>
                                <td>{{$study[$student->student_mother_study]}}</td>
                            </tr>
                            <tr>
                                <td class="text-right">6. </td>
                                <td>Pekerjaan</td>
                                <td class="text-center">:</td>
                                <td>Ayah</td>
                                <td class="text-center">:</td>
                                <td>{{$job[$student->student_father_job]}}</td>
                                <td>Ibu</td>
                                <td class="text-center">:</td>
                                <td>{{$job[$student->student_mother_job]}}</td>
                            </tr>
                            <tr>
                                <td class="text-right">7. </td>
                                <td>Penghasilan Orangtua/Wali</td>
                                <td class="text-center">:</td>
                                <td colspan="6">{{$value[$student->student_parent_value]}}</td>
                            </tr>
                            <tr>
                                <td class="text-right">8. </td>
                                <td>Nomor HP Orangtua/Wali</td>
                                <td class="text-center">:</td>
                                <td colspan="6">{{$student->student_phone}}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <tr>
                                <td colspan="5" class="font-weight-bold">III. INFORMASI SEKOLAH ASAL</td>
                            </tr>
                            <tr>
                                <td class="text-right" style="width: 1%">1. </td>
                                <td style="width: 25%">Nama Sekolah</td>
                                <td class="text-center" style="width: 1%;">:</td>
                                <td>{{$student->student_from_school}}</td>
                            </tr>
                            <tr>
                                <td class="text-right">2. </td>
                                <td>Nomor Pokok Sekolah Nasional</td>
                                <td class="text-center">:</td>
                                <td>{{$student->student_from_school_npsn}}</td>
                            </tr>
                            <tr>
                                <td class="text-right">3. </td>
                                <td>Nomor Ijazah</td>
                                <td class="text-center">:</td>
                                <td>{{$student->student_no_ijazah}}</td>
                            </tr>
                            <tr>
                                <td class="text-right">4. </td>
                                <td>Nomor SKHUN</td>
                                <td class="text-center">:</td>
                                <td>{{$student->student_no_skhun}}</td>
                            </tr>
                        </table>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <tr>
                                <td colspan="5" class="font-weight-bold">IV. BERKAS PERSYARATAN</td>
                            </tr>
                            <tr>
                                <td style="width: 1%">1. </td>
                                <td style="text-align: left; width: 20%">STTB</td>
                                <td style="text-align: center; width: 1%">:</td>
                                <td style="text-align: left; "><input type="checkbox" {{$student->student_sttb_file != null ? 'checked' : null}}></td>
                            </tr>
                            <tr>
                                <td>2. </td>
                                <td style="text-align: left; ">SKHUN</td>
                                <td style="text-align: center; ">:</td>
                                <td style="text-align: left; "><input type="checkbox" {{$student->student_skhun_file != null ? 'checked' : null}}></td>
                            </tr>
                            <tr>
                                <td>3. </td>
                                <td style="text-align: left; ">Foto</td>
                                <td style="text-align: center; ">:</td>
                                <td style="text-align: left; "><input type="checkbox" {{$student->student_photo_file != null ? 'checked' : null}}></td>
                            </tr>
                            <tr>
                                <td>4. </td>
                                <td style="text-align: left; ">Akte Kelahiran</td>
                                <td style="text-align: center; ">:</td>
                                <td style="text-align: left; "><input type="checkbox" {{$student->student_akte_file != null ? 'checked' : null}}></td>
                            </tr>
                            <tr>
                                <td>5. </td>
                                <td style="text-align: left; ">Kartu PKH/KIP/PIP</td>
                                <td style="text-align: center; ">:</td>
                                <td style="text-align: left; "><input type="checkbox" {{$student->student_pip_file != null ? 'checked' : null}}></td>
                            </tr>
                        </table>
                    </div>
                <div class="card-footer text-right">
                    <form action="{{route('admission.print')}}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="student_nisn" value="{{$student->student_nisn}}">
                        <button type="submit" class="btn bg-info btn-labeled btn-labeled-left" name="submit" value="print"><b><i class="icon-printer"></i></b>Cetak</button>
                    </form>
                </div>
                @else
                <div class="card-body">
                    <p>Untuk Formulir Pendaftaran, Silahkan masukkan NISN terdaftar diform samping berikut ini. Pastikan Nama dan Tempat
                        Tanggal lahir sesuai dengan yang dimasukkan ketika mendaftar.</p>
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection
