<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

class UserDestroyController extends BaseController
{
    public function __invoke(User $user)
    {
        $this->service->userDestroy($user);

        return back();
    }
}
