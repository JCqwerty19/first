<?php

namespace App\Services\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class Service
{
    // Login
    public function attempt($data)
    {
        if (!Auth::attempt($data))
        {
            return back();
        }
    }

    // Create
    public function create($data)
    {
        $data['avatar'] = 'https://cdn-icons-png.flaticon.com/128/149/149071.png';
        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);
        Auth::login($user);
    }

    // Logout
    public function logout()
    {
        Auth::logout();
    }
}