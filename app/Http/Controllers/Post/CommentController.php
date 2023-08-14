<?php

namespace App\Http\Controllers\Post;

use App\Http\Requests\Post\CommentRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;

class CommentController extends BaseController
{
    public function __invoke(Post $post, CommentRequest $request)
    {
        $data = $request->validated();

        $this->service->comment($post, $data);

        return back();
    }
}
