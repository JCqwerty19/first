<?php

namespace App\Http\Controllers\Auth\Login;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Controllers\Auth\Login\BaseController;
use Illuminate\Http\Request;


class CheckController extends BaseController
{
    public function __invoke(LoginRequest $request)
    {
        $data = $request->validated();

        $this->service->login($data);

        return redirect()->route('admin.dashboard');
    }
}
