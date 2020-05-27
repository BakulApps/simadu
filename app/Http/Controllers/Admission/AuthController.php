<?php

namespace App\Http\Controllers\Admission;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        if ($request->isMethod('post')){
            return $this->authenticated($request);
        }
        else {
            return view('admission.admin.login');
        }
    }

    public function authenticated(Request $request)
    {
        $credentials = ['user_name' => $request->user_name, 'password' => $request->user_pass];
        if (Auth::guard('admission')->attempt($credentials, $request->remember)){
            return redirect()->route('admission.admin.home');
        }
        else {
            return redirect()->back()->withInput()->with('msg', 'Nama Pengguna dan Kata Sandi tidak tepat');
        }
    }

    public function logout()
    {
        Auth::guard('admission')->logout();
        return redirect()->route('admission.admin.login')->with('msg', 'Anda berhasil keluar.');
    }
}
