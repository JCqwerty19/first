<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\AttemptRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttemptController extends BaseController
{
    public function __invoke(AttemptRequest $request)
    {
        $data = $request->validated();

        $this->service->attempt($data);

        return redirect()->route('site.main');
    }
}