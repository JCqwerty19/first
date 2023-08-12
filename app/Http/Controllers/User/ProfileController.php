<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

class ProfileController extends Controller
{
    public function __invoke(User $user)
    {
        $variables =
        [
            'posts' => $user->posts,
            'user' => $user,
        ];

        return view('users.profile', $variables);
    }
}
