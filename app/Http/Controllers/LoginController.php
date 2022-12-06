<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'title' => 'Login',
            'active' => 'Login'
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);
        
        $user = DB::select('select count(*) AS u from users where email = ? AND password=?',[$request->email, $request->password])[0];
        $user = $user->u;
        if($user === 1){
            $email = $request->email;
            $password = $request->password;
            return redirect('/skincare');
        }

        // if (Auth::attempt($credentials)) {
        //     $request->session()->regenerate();
        //     return redirect()->intended('/skincare');
        //     // dd('bwa');
        // }
        // return back();
        return back()->with('Login Eror','Please Insert Correct Email or Password!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/')->with('success','Yee, kamu sudah keluar. Sampai ketemu lagi.');
    }
}
