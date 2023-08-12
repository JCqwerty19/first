<?php

namespace App\Http\Controllers\Post;

use App\Http\Requrests\Post\StoreRequrest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StoreController extends BaseController
{
    public function __invoke(StoreRequrest $request)
    {
        $data = $request->validated();

        $this->service->store($data);

        return redirect('users.profile');
    }
}
