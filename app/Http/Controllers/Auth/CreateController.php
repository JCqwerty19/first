<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\CreateRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateController extends BaseController
{
    public function __invoke(CreateRequest $request)
    {
        $data = $request->validated();

        $this->service->create($data);

        return redirect('users.home');
    }
}