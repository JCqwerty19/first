<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends BaseController
{
    public function __invoke()
    {
        return view('auth.login');
    }
}