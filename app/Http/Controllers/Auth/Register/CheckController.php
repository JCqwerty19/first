<?php

namespace App\Http\Controllers\Auth\Register;

use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Controllers\Auth\Login\BaseController;
use Illuminate\Http\Request;

class CheckController extends BaseController
{
    public function __invoke(RegisterRequest $request)
    {
        $data = $request->validated();

        $this->service->register($data);

        return redirect()->route('admin.dashboard');
    }
}
