<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends BaseController
{
    public function __invoke()
    {
        $this->service->logout();

        return redirect()->route('site.main');
    }
}