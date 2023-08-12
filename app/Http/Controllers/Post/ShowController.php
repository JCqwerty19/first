<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;

class ShowController extends BaseController
{
    public function __invoke(Post $post)
    {
        $variables =
        [
            'post' => $post,
            'comments' => $post->comments,
        ];

        return view('posts.show', $variables);
    }
}
