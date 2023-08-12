<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

class UsersController extends Controller
{
    public function __invoke()
    {
        $users = User::all();
        return view('admin.users', 'users');
    }
}
