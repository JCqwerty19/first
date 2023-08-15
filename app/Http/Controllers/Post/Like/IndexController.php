<?php

namespace App\Http\Controllers\Post\Like;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;

class IndexController extends Controller
{
    public function __invoke(Post $post)
    {
        $variables =
        [
            'likes' => $post->likes,
            'post' => $post,
        ];

        return view('posts.likes', $variables);


    }
}
