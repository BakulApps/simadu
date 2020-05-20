<?php

namespace App\Http\Controllers\Graduate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            return view('graduate.admin.login');
        }
    }

    public function authenticated(Request $request)
    {
        $credentials = ['user_name' => $request->user_name, 'password' => $request->user_pass];
        if (Auth::guard('graduate')->attempt($credentials, $request->remember)){
            return redirect()->route('admin.home');
        }
        else {
            return redirect()->back()->withInput()->with('msg', 'Nama Pengguna dan Kata Sandi tidak tepat');
        }
    }

    public function logout()
    {
        Auth::guard('graduate')->logout();
        return redirect()->route('admin.login')->with('msg', 'Anda berhasil keluar.');
    }
}
