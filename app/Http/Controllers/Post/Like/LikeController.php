<?php

namespace App\Http\Controllers\Post\Like;

use App\Http\Controllers\Post\BaseController;
use Illuminate\Http\Request;

use App\Models\Post;

class LikeController extends BaseController
{
    public function __invoke(Post $post)
    {
        $this->service->like($post);

        return back();
    }
}
