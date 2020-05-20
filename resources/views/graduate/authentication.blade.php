@extends('graduate.layouts.master')
@section('content')
    <div class="col-md-5">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <div class="card-img-actions d-inline-block mb-2">
                        <img src="{{asset('storage/sites/graduate/images/logo_school.png')}}" width="100" height="100" alt="">
                    </div>
                </div>
                <div class="text-center mb-0">
                    <h4 class="font-weight-bold mb-0 text-danger">CEK AUTENTIKASI</h4>
                    <span class="d-block text-muted mb-3">{{\App\Models\Graduate\Setting::SubNameSchool()}}</span>
                    <table class="table table-borderless table-xs font-weight-bold" style="margin-left:auto;margin-right:auto;">
                        <tr>
                            <td class="text-left" style="width: 35%">UUID</td>
                            <td class="text-left" style="width: 65%">: {{$notify->notify_id}}</td>
                        </tr>
                        <tr>
                            <td class="text-left">Nomor Surat : </td>
                            <td class="text-left">: {{$notify->notify_number == null ? '' : $notify->notify_number . \App\Models\Graduate\Setting::value('setting_notify_letter') }}</td>
                        </tr>
                        <tr>
                            <td class="text-left">Nama Lengkap</td>
                            <td class="text-left">: {{$notify->student_name}}</td>
                        </tr>
                        <tr>
                            <td class="text-left">NISM</td>
                            <td class="text-left">: {{$notify->student_nism}}</td>
                        </tr>
                        <tr>
                            <td class="text-left">NISN</td>
                            <td class="text-left">: {{$notify->student_nisn}}</td>
                        </tr>
                        <tr>
                            <td class="text-left">TTL</td>
                            <td class="text-left">: {{$notify->student_place_birth == null ? '' : $notify->student_place_birth .', '. \Carbon\Carbon::createFromFormat('Y-m-d', $notify->student_birthday)->formatLocalized('%d %B %Y')}}</td>
                        </tr>
                        <tr>
                            <td class="text-left">Jenis Kelamin</td>
                            <td class="text-left">: {{$notify->student_gender == null ? '' : $gender[$notify->student_gender]}}</td>
                        </tr>
                        <tr>
                            <td class="text-left">Nama Wali</td>
                            <td class="text-left">: {{$notify->student_parent}}</td>
                        </tr>

                        <tr>
                            <td class="text-left">Total Nilai</td>
                            <td class="text-left">: {{$notify->notify_value_total}}</td>
                        </tr>
                        <tr>
                            <td class="text-left">Jumlah Cetakan</td>
                            <td class="text-left">: {{$notify->notify_print == null ? '' : $notify->notify_print . ' Kali'}}</td>
                        </tr>
                    </table>
                    @if($notify->notify_id == null)
                        <p class="font-weight-semibold mt-2">
                            Data tidak ditemukan, silahkan hubungi pihak terkait.
                        </p>
                        <h2 class="bg-danger font-weight-bold mb-3">DATA TIDAK DITEMUKAN!</h2>
                    @else
                        <p class="font-weight-semibold mt-2">
                            Pastikan data yang terdapat dalam surat sesuai dengan data diatas, jika sesuai maka dokumen tersebut :
                        </p>
                        <h2 class="bg-success font-weight-bold mb-3">ASLI</h2>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
