<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function __invoke()
    {
        $variables =
        [
            'user' => auth()->user(),
        ];

        return view('users.settings', $variables);
    }
}