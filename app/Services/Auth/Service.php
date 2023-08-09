<?php

namespace App\Services\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use illuminate\Validation\ValidationException;

use App\Models\User;


class Service
{
    public function login($data)
    {
        if (!Auth::attempt($data))
        {
            throw ValidationException::withWessages(
                [
                    'email' => 'This email does not exist',
                    'password' => 'Incorrect password',
                ]
            );
        }
    }

    public function register($data)
    {
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        Auth::login($user);
    }

    public function logout()
    {
        Auth::logout();
    }
}