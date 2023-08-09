<?php

namespace App\Http\Controllers\Auth\Register;

use App\Http\Controllers\Auth\Login\BaseController;
use Illuminate\Http\Request;

class IndexController extends BaseController
{
    public function __invoke()
    {
        return view('auth.register');
    }
}
