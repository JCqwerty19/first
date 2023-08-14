<?php

namespace App\Services\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class Service
{
    public function attempt($data)
    {
        $errors =
        [
            'email' => 'This email have not registered in site',
        ];

        if (!Auth::attempt($data))
        {
            return back()->withInputs()->withErrors($errors);
        }
    }

    public function create($data)
    {
        $data['avatar'] = 'https://cdn-icons-png.flaticon.com/128/149/149071.png';
        $user = User::create($data);
        Auth::login($user);
    }

    public function logout()
    {
        Auth::logout();
    }
}