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

        $post = Post::find(5);
        foreach($post->likes as $like)
        {
            dd($like->user);
        }
        dd($post->likes);


        return view('posts.likes', $variables);


    }
}
