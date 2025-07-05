<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function showLoginForm()
    {
        return view('login');
    }

    public function login(UserRequest $request)
    {
        $User = $request->only(['email','password']);

        if (auth()->attempt($User)) {
            return redirect('/');
        }
        return back()->withErrors([
            'email' => 'メールアドレスまたはパスワードが正しくありません',
        ])->withInput();
    }
}
