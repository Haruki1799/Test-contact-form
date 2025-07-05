<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{

    public function Registration(RegisterRequest $request)
    {
        $User = $request->only(['name', 'email', 'password']);
        User::create($User);

        return view('/');
    }
    public function store(RegisterRequest $request)
    {
        $data = $request->validated();

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        return redirect('/');
    }
}
