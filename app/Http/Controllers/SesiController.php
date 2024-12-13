<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesiController extends Controller
{
    function index()
    {
        return view('login');
    }
    function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ],[
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($infologin)){
           if(auth::user()->role == 'admin'){
            return redirect('/admin');
           } elseif (auth::user()->role == 'dokter'){
            return redirect('/dokter');
           } elseif (auth::user()->role == 'pasien'){
            return redirect('/pasien');
           }
        }else{
            return redirect('')->withErrors('Username dan Password tidak sesuai')->withInput();
        }
    }

    function logout(){
        Auth::logout();
        return redirect('');
    }
}
