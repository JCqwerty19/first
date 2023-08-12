<?php

namespace App\Services\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class Service
{
    public function attempt($data)
    {
        if (!Auth::attempt($data))
        {
            return back()->withInputs()->withErrors();
        }
    }

    public function create($data)
    {
        $user = User::create($data);
        Auth::login($user);
    }

    public function logout()
    {
        Auth::logout();
    }
}