<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('golfpark.login');
    }
    public function new_account()
    {
        return view('golfpark.new_account');
    }
    public function accountCreate(LoginRequest $request)
    {
        $account = $request->all();
        User::create($account);
        return redirect('/');
    }
    public function login(LoginRequest $request){
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // $request->session()->regenerate();
            // return ridirect('top')->with('login_success', 'ログインしました');
            return redirect('top')->intended('dashboard');
        }
        return back()->withErrors([
            'login_error' => 'メールアドレスかパスワードが間違っています',
        ]);
    }
}
