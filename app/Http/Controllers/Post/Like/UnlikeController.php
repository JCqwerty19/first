<?php

namespace App\Http\Controllers\Post\Like;

use App\Http\Controllers\Post\BaseController;
use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Like;

class UnlikeController extends BaseController
{
    public function __invoke(Post $post)
    {
        $like = Like::where('user_id', auth()->user()->id)
                    ->where('post_id', $post->id)->get();
        dd($like);

        $this->service->unlike($like);

        return back();
    }
}
