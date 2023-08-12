<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;

class PostsController extends Controller
{
    public function __invoke()
    {
        $posts = Post::all();
        return view('admin.posts', 'posts');
    }
}
