<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Str;
use Session;


class AuthController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::check()) {
            return redirect()->intended('dashboard/');
        } else {
            return view('reglogs.login');
        }
    }

    public function postlogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|min:3|max:255',
            'password' => 'required|min:4|max:255'
        ]);

        $email =  $request->input('email');
        $password = $request->input('password');
        $remember = $request->input('remember');

        if (Auth::attempt(['email' => $email, 'password' => $password, 'isadmin' => 1], $remember)) {
            return redirect()->intended(route('dashboard'));
        } else {
            Session::flash('failure', 'Login Failed, Invalid username or email.');
            return redirect()->route('getadminlogin');
        }
    }

    public function register()
    {
        if (Auth::check() && Auth::user()->is_backuser == 1) {
            return redirect()->intended(route('dashboard'));
        } else {
            return view('reglogs.register');
        }
    }

    public function postregister(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|min:3|max:255|unique:users,name',
            'email' => 'required|max:255|unique:users,email',
            'password' => 'required|confirmed|min:4|max:255',
        ]);

        $user = new  User;
        $user->name = $request->input('username');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->isadmin = 1;
        $user->save();
        return redirect()->route('getadminlogin');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('getadminlogin');
    }


    public function dashboard()
    {

       // return view('reglogs.admindash');
        return view('dashboard.index');
    }
 
}
