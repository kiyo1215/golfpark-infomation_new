<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;
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
        \Session::flash('addAccount_msg', '登録しました');
        return redirect('/');
    }
    public function login(LoginRequest $request){
        $credentials = $request->only('name', 'email', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('top')->with('login_success', 'ログインしました');
        }
        return back()->withErrors([
            'login_error' => 'メールアドレスかパスワードが間違っています',
        ]);
    }
    // public function top()
    // {
    //     $user = Auth::user();
    //     $items = Author::paginate(4);
    //     $param = ['items' => $items, 'user' =>$user];
    //     $param = ['user' =>$user];
    //     return view('golfpark.top', $param);
    // }
    // public function login(LoginRequest $request)
    // {
    // $email = $request->email;
    // $password = $request->password;
    // if (Auth::attempt(['email' => $email,
    //         'password' => $password])) {
    //     return view('golfpark.top');
    // } else {
    //     // $text = 'ログインに失敗しました';
    //     return back()->withErrors([
    //         'login_error' => 'メールアドレスかパスワードが間違っています',
    //         ]);
    //     }
    // }
}
