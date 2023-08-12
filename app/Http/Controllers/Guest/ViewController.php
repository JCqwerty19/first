<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;

class ViewController extends Controller
{
    public function __invoke(Post $post)
    {
        return view('posts.view', $post);
    }
}
