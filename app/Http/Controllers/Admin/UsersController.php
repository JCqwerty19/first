<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

class UsersController extends Controller
{
    public function __invoke()
    {
        $variables =
        [
            'users' => User::paginate(20),
        ];

        return view('admin.users', $variables);
    }
}