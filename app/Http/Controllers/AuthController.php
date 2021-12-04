<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $items = Author::paginate(4);
        $param = ['items' => $items, 'user' =>$user];
        return view('golfpark.login', $param);
    }
}
