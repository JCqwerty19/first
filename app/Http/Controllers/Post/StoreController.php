<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;

class StoreController extends BaseController
{
    public function __invoke(Post $data)
    {
        $data = request->validated();
    }
}
