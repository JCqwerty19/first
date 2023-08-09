<?php

namespace App\Http\Controllers\Auth\Login;

use App\Http\Controllers\Auth\Login\BaseController;
use Illuminate\Http\Request;

class IndexController extends BaseController
{
    public function __invoke()
    {
        return view('auth.login');
    }
}
