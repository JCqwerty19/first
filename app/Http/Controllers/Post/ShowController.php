<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;

class ShowController extends BaseController
{
    public function __invoke(Post $post)
    {
        // $dd = Post::find(5);
        // $like = $dd->likes->where('post_id', 5);
        // dd($like);
        $variables =
        [
            'post' => $post,
            'comments' => $post->comments,
            'likes' => $post->likes->count(),
        ];

        return view('posts.show', $variables);
    }
}
